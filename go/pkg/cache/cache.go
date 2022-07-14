package cache

import (
	"fmt"
	"sync"

	"github.com/coocood/freecache"
)

const (
	noExpiryTTL = iota
	cSize       = 1024 * 1024
)

type cacheDB struct {
	sync.RWMutex
	mem map[int64]*freecache.Cache
}

type CacheManager interface {
	Set(tid int64, key, val []byte) (err error)
	Get(tid int64, key []byte) (val []byte, err error)
	Delete(tid int64)
}

func (c *cacheDB) set(tid int64, key, val []byte) error {
	c.Lock()
	defer c.Unlock()
	table, ok := c.mem[tid]
	if !ok {
		table = freecache.NewCache(len(val) * cSize)
		c.mem[tid] = table
	}
	return table.Set(key, val, noExpiryTTL)
}

func (c *cacheDB) get(tid int64, key []byte) ([]byte, error) {
	c.RLock()
	defer c.RUnlock()
	if table, ok := c.mem[tid]; ok {
		val, err := table.Get(key)
		if err == nil {
			return val, nil
		}
		return val, fmt.Errorf("key not found: %w", err)
	}
	return nil, fmt.Errorf("table not found for %d", tid)
}

func (c *cacheDB) Get(tid int64, key []byte) ([]byte, error) {
	return c.get(tid, key)
}

func (c *cacheDB) Set(tid int64, key, val []byte) error {
	return c.set(tid, key, val)
}

func (c *cacheDB) Delete(tid int64) {
	c.Lock()
	defer c.Unlock()
	if t, ok := c.mem[tid]; ok {
		t.Clear()
		delete(c.mem, tid)
	}
}

// NewDB initializes a cache that exposes only three
// methods — Set, Get, Delete.
func NewDB() CacheManager {
	cm := new(cacheDB)
	cm.mem = make(map[int64]*freecache.Cache)
	return cm
}
