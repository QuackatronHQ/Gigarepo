package main

import (
	"bytes"
	"image"
	"image/color"
	_ "image/jpeg"
	"math"
)

func imageIndex(img []image.Image, find image.Image) int {
	for i, _ := range img {
		if img[i] == find {
			return i
		}
	}
	return -1
}

func imageCopyA(src []image.Image, dst []image.Image) {
	for i, img := range src {
		dst[i] = img
	}
}

func imageCopyB(src []image.Image) (dst []image.Image) {
	dst = make([]image.Image, 0, len(src))
	for _, img := range src {
		dst = append(dst, img)
	}
	return dst
}

func imageDecoder(buf []byte) (image.Image, error) {
	img, _, err := image.Decode(bytes.NewReader(buf))
	if err != nil {
		return img, err
	}
	return img, nil
}

func toGreyscale(buf []byte) image.Image {
	orig, err := imageDecoder(buf)
	if err != nil {
		return orig
	}

	imgSize := orig.Bounds().Size()
	rect := image.Rect(0, 0, imgSize.X, imgSize.Y)
	greyImg := image.NewRGBA(rect)

	var origColor color.RGBA
	var R, G, B float64
	var GREY uint8
	for x := 0; x < imgSize.X; x++ {
		for y := 0; y < imgSize.Y; y++ {
			origColor = color.RGBAModel.Convert(orig.At(x, y)).(color.RGBA)

			R = float64(origColor.R)
			G = float64(origColor.G)
			B = float64(origColor.B)

			GREY = uint8(math.Round(R+G+B) / 3)
			greyImg.Set(x, y, color.RGBA{R: GREY, G: GREY, B: GREY, A: origColor.A})
		}
	}

	return greyImg
}
