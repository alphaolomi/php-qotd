<?php
// Server configuration
$serverIp = '127.0.0.1';
$serverPort = 12345;

// Create a UDP socket
$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_bind($socket, $serverIp, $serverPort);

// Sample quotes array
$quotes = [
    "Quote 1",
    "Quote 2",
    "Quote 3",
    // Add more quotes here
];

while (true) {
    // Receive data from client
    socket_recvfrom($socket, $data, 1024, 0, $clientIp, $clientPort);
    echo "Received request from $clientIp:$clientPort" . PHP_EOL;

    // Select a random quote
    $randomQuote = $quotes[array_rand($quotes)];

    // Send the quote back to the client
    socket_sendto($socket, $randomQuote, strlen($randomQuote), 0, $clientIp, $clientPort);
}
