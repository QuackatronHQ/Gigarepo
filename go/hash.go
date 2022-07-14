package main

import (
	"math/rand"
	"time"

	"github.com/pierrec/xxHash/xxHash32"
)

func randomSeed() uint32 {
	rand.Seed(time.Now().UnixNano())
	seeds := []uint32{0xCAFE, 0xcaFE, 0xcafe, 0xCAAF, 0xFACE}
	min, max := 0, len(seeds)-1
	return seeds[rand.Intn(max-min+1)+min]
}

var xxhash = xxHash32.New(randomSeed()) // hash.Hash32

func fastHash(clear bool, buf []byte) uint32 {
	xxhash.Reset()
	xxhash.Write(buf)
	return xxhash.Sum32()
}
