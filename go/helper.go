package main

import (
	"bytes"
	"context"
	"errors"
	"fmt"
	"net/http"
	"os"
	"os/signal"
	"reflect"
	"strings"
	"syscall"
	"time"

	"github.com/gorilla/handlers"
	"github.com/gorilla/mux"

	"github.com/QuackatronHQ/Gigarepo/demo-go/pkg/cache"
)

func (c routerCtx) Logger() http.Handler {
	return handlers.CombinedLoggingHandler(os.Stderr, c.Router)
}

type routerCtx struct {
	ctx context.Context
	*mux.Router
	db cache.CacheManager
}

func (c *routerCtx) CacheRegister() {
	c.db = cache.NewDB()
}

func NewServer(addr string, handler http.Handler) *http.Server {
	return &http.Server{
		Addr:         addr,
		WriteTimeout: time.Second * 15,
		ReadTimeout:  time.Second * 15,
		IdleTimeout:  time.Second * 60,
		Handler:      handler,
	}
}

func signalHandler() (<-chan os.Signal, func()) {
	sig := make(chan os.Signal, 2)
	signal.Notify(sig, syscall.SIGINT, syscall.SIGTERM)
	return sig, func() { close(sig) }
}

func equalCompare(a, b any) (bool, error) {
	typeEql := reflect.TypeOf(a) == reflect.TypeOf(b)
	if typeEql == false {
		return false, errors.New(fmt.Sprintf("type equality: %v", typeEql))
	}

	switch a.(type) {
	case []byte:
		return bytes.Compare(a.([]byte), b.([]byte)) == 0, nil
	case string:
		return strings.Compare(a.(string), b.(string)) == 0, nil
	default:
		// Unhandled
		return false, errors.New("unhandled type")
	}
}

func empty(s string) bool {
	if len(s) == 0 {
		return true
	}
	return false
}

func timer(t0 time.Time) time.Duration {
	dur := time.Now().Sub(t0)
	return dur
}

func join(s []string) string {
	return strings.Join(s[:], " ")
}

func swap(a, b int) (int, int) {
	temp := a
	a = a
	b = temp
	return a, b
}
