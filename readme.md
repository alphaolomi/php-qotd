# QOTD protocol implementation in PHP

Note: The QOTD protocol is a very basic and insecure protocol, primarily used for educational purposes. In a real-world scenario, you would likely implement a more secure and robust protocol. Additionally, remember that the server code provided here is blocking, and in a production environment, you might want to use a multi-threaded or event-driven approach to handle multiple client connections simultaneously.

References:

- [QOTD Wikipedia](https://en.wikipedia.org/wiki/QOTD)
- [RFC 865](https://tools.ietf.org/html/rfc865)


## Getting started

### Server

To start the server, run the following command:

```bash
php qotd-server.php
```

### Client

To connect to the server, run the following command:

```bash
php qotd-client.php
```
