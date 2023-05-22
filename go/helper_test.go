package main

import (
	"net/http"
	"testing"

	"github.com/stretchr/testify/assert"
)

type mockHandler struct{}

func (mockHandler) ServeHTTP(http.ResponseWriter, *http.Request) {}

func TestNewServer(t *testing.T) {
	var addr = "127.0.0.1:8080"
	var srv = NewServer(addr, mockHandler{})
	if !assert.Equal(t, addr, srv.Addr) {
		t.Fail()
	}
}
