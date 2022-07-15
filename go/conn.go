package main

import (
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

func dialSSH(user, password, host string, port int) (*ssh.Client, func()) {
	var auths []ssh.AuthMethod
	aconn, err := net.Dial("unix", os.Getenv("SSH_AUTH_SOCK"))
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

	addr := fmt.Sprintf("%s:%d", host, port)
	conn, err := ssh.Dial("tcp", addr, &config)
	if err != nil {
		log.Fatalf("unable to connect to [%s]: %v", addr, err)
	}

	return conn, func() { conn.Close() }
}
