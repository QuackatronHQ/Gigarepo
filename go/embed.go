package main

import "embed"

//go:embed images/*.jpg
var embedFS embed.FS

var _ = 1
