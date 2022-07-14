package main

import (
	"bytes"
	"encoding/json"
	"fmt"
	"image/jpeg"
	"log"
	"net/http"
	"path"
	"strconv"

	"github.com/gorilla/mux"
)

// TID(s) are used by cache
const (
	ListTID = iota
	OrigTID
	GreyTID
)

// RegisterHandlers register the handlers.
//
// API:
//
// Description:
// > GET /list
//
// > GET /original/{image}
//
// > GET /greyscale/{image}
func (c routerCtx) RegisterHandlers() {
	c.HandleFunc("/list", c.GetImages).Methods(http.MethodGet)
	c.HandleFunc("/original/{image}", c.OriginalImage).Methods(http.MethodGet)
	c.HandleFunc("/greyscale/{image}", c.GreyscaleImage).Methods(http.MethodGet)
}

type List struct {
	Files []string
}

func (c routerCtx) GetImages(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	dir, err := embedFS.ReadDir("images")
	if err != nil {
		log.Println("read file:", err)
		w.WriteHeader(http.StatusBadRequest)
		w.Write([]byte(fmt.Errorf("error: %v", err).Error()))
		return
	}

	var ls List
	ls.Files = make([]string, 0, len(dir))
	for _, d := range dir {
		ls.Files = append(ls.Files, d.Name())
	}

	json.NewEncoder(w).Encode(ls)
}

func (c routerCtx) OriginalImage(w http.ResponseWriter, r *http.Request) {
	vars := mux.Vars(r)
	img := vars["image"]
	b, err := embedFS.ReadFile(path.Join("images", img))
	if err != nil {
		log.Println("read file:", err)
		http.Error(w, err.Error(), http.StatusBadRequest)
		return
	}
	w.Header().Set("Content-Type", "image/jpeg")
	w.Header().Set("Content-Length", strconv.Itoa(len(b)))
	w.Write(b)
}

func (c routerCtx) GreyscaleImage(w http.ResponseWriter, r *http.Request) {
	vars := mux.Vars(r)
	img := vars["image"]

	key := []byte(fmt.Sprintf("%x", fastHash(true, []byte(img))))

	val, err := c.db.Get(GreyTID, key)
	if err == nil {
		log.Println("cache get: served from cache")
		w.Header().Set("Content-Type", "image/jpeg")
		w.Header().Set("Content-Length", strconv.Itoa(len(val)))
		w.Write(val)
		return
	}
	log.Println("cache get:", err)

	b, err := embedFS.ReadFile(path.Join("images", img))
	if err != nil {
		log.Println("read file:", err)
		http.Error(w, err.Error(), http.StatusForbidden)
		return
	}

	buf := &bytes.Buffer{}
	buf.Grow(len(b))
	if err := jpeg.Encode(buf, toGreyscale(b), &jpeg.Options{Quality: 100}); err != nil {
		http.Error(w, err.Error(), http.StatusBadRequest)
	}

	err = c.db.Set(GreyTID, key, buf.Bytes())
	if err != nil {
		log.Println("cache set:", err)
	}

	w.Header().Set("Content-Type", "image/jpeg")
	w.Header().Set("Content-Length", strconv.Itoa(buf.Len()))
	w.Write(buf.Bytes())
}
