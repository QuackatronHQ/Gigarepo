package main

import (
	"net/http"
	"testing"

	"github.com/stretchr/testify/assert"
)

type mockHandler struct{}

func (m mockHandler) ServeHTTP(http.ResponseWriter, *http.Request) {}

func TestNewServer(t *testing.T) {
	addr := "127.0.0.1:8080"
	srv := NewServer(addr, mockHandler{})
	if !assert.Equal(t, addr, srv.Addr) {
		t.Fail()
	}
}
