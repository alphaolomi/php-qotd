<?php
// Server configuration
$serverIp = '127.0.0.1';
$serverPort = 12345;

// Create a UDP socket
$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);

// Send a request to the server
socket_sendto($socket, "Give me a quote!", strlen("Give me a quote!"), 0, $serverIp, $serverPort);

// Receive the response from the server
socket_recvfrom($socket, $response, 1024, 0, $serverIp, $serverPort);

// Display the quote
echo "Quote of the day: $response" . PHP_EOL;

// Close the socket
socket_close($socket);
