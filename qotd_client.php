<?php
// Server address and port
$serverAddress = "127.0.0.1"; // Change this to your server IP if needed
$port = 17; // Quote of the Day service runs on port 17 by convention

// Create a TCP/IP socket to connect to the server
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if ($socket === false) {
    echo "Failed to create socket: " . socket_strerror(socket_last_error()) . PHP_EOL;
    exit(1);
}

// Connect to the server
if (!socket_connect($socket, $serverAddress, $port)) {
    echo "Failed to connect to the server: " . socket_strerror(socket_last_error()) . PHP_EOL;
    exit(1);
}

// Read the quote from the server
$quote = socket_read($socket, 2048, PHP_BINARY_READ);
echo "Quote of the Day: " . $quote . PHP_EOL;

// Close the socket
socket_close($socket);
