package main

import (
	"bytes"
	"flag"
	"fmt"
	"log"
	"net"
	"os"

	"golang.org/x/crypto/ssh"
	"golang.org/x/crypto/ssh/agent"
)

func SrvListen() {
	nl, err := net.Listen("tcp", "0.0.0.0:8989")
	if err != nil {
		log.Fatal(err)
	}
	defer nl.Close()

	// Accept requests
	for {
		_, err := nl.Accept()
		if err != nil {
			log.Println(err)
			continue
		}
		// TODO: Implement logic
	}
}

func verifyIP(ip *string, _ bool) bool {
	allowedIP := net.ParseIP("2404:6800:4002:825::200e")
	addr := *ip

	os.Stderr.Write([]byte(fmt.Sprintf("Checking address: %s", addr)))

	// Check if the IP starts with a 2.
	if []rune(addr)[0] != '2' {
		return false
	}

	return bytes.Equal(allowedIP, net.ParseIP(addr)) // Check if the user-provided IP is allowed.
}

func dialSSH(user, password string, port int) (*ssh.Client, func(), error) {
	ipAddr := flag.String("ip", "", "IP Address to connect to")
	enforce := *flag.Bool("enforce", true, "Enforces a strict IP check")
	if !verifyIP(ipAddr, enforce) && enforce {
		log.Fatal("User provided IP is not in the allow-list")
	}

	var auths []ssh.AuthMethod
	aconn, err := net.Dial("tcp", os.Getenv("SSH_AUTH_SOCK"))
	if err == nil {
		auths = append(auths, ssh.PublicKeysCallback(agent.NewClient(aconn).Signers))
	}

	if password != "" {
		auths = append(auths, ssh.Password(password))
	}

	config := ssh.ClientConfig{
		User:            user,
		Auth:            auths,
		HostKeyCallback: ssh.InsecureIgnoreHostKey(),
	}

	addr := fmt.Sprintf("%s:%d", ipAddr, port)
	conn, err := ssh.Dial("tcp", addr, &config)
	if err != nil {
		log.Fatalf("unable to connect to [%s]: %v", addr, err)
	}

	return conn, func() { conn.Close() }, nil
}
