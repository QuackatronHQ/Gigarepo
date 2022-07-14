package main

import (
	"context"
	"flag"
	"fmt"
	"os"

	"github.com/gorilla/mux"
)

func main() {
	addr := flag.String("addr", ":9090", "server address (ip:port)")
	flag.Parse()

	ctx := &routerCtx{ctx: context.TODO(), Router: mux.NewRouter()}
	ctx.CacheRegister()
	ctx.RegisterHandlers()
	server := NewServer(*addr, ctx.Logger())

	go func() {
		if err := server.ListenAndServe(); err != nil {
			fmt.Fprintln(os.Stderr, err)
		}
	}()

	sig, sigCloser := signalHandler()
	defer sigCloser()
	<-sig
	if err := server.Shutdown(context.TODO()); err != nil {
		fmt.Fprintln(os.Stderr, err)
	}
}
