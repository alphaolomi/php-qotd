<?php
// Quote of the Day data (you can add more quotes to the array)
$quotes = [
    "The greatest glory in living lies not in never falling, but in rising every time we fall. - Nelson Mandela",
    "The way to get started is to quit talking and begin doing. - Walt Disney",
    "Life is what happens when you're busy making other plans. - John Lennon",
    "The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt",
    "In the end, it's not the years in your life that count. It's the life in your years. - Abraham Lincoln"
];

// Create a TCP/IP socket to listen for connections
$serverAddress = "127.0.0.1"; // Change this to your server IP if needed
$port = 17; // Quote of the Day service runs on port 17 by convention

// Create the socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if ($socket === false) {
    echo "Failed to create socket: " . socket_strerror(socket_last_error()) . PHP_EOL;
    exit(1);
}

// Bind the socket to the specified address and port
if (!socket_bind($socket, $serverAddress, $port)) {
    echo "Failed to bind socket: " . socket_strerror(socket_last_error()) . PHP_EOL;
    exit(1);
}

// Start listening for incoming connections
if (!socket_listen($socket, 1)) {
    echo "Failed to listen on socket: " . socket_strerror(socket_last_error()) . PHP_EOL;
    exit(1);
}

echo "Quote of the Day server is running on $serverAddress:$port" . PHP_EOL;

// Function to pick a random quote from the quotes array
function getRandomQuote()
{
    global $quotes;
    $index = array_rand($quotes);
    return $quotes[$index];
}

// Main server loop
while (true) {
    // Accept incoming client connections
    $clientSocket = socket_accept($socket);
    if ($clientSocket) {
        echo "New client connected." . PHP_EOL;

        // Generate a random quote
        $quote = getRandomQuote();

        // Send the quote to the client
        socket_write($clientSocket, $quote, strlen($quote));

        // Close the client connection
        socket_close($clientSocket);
        echo "Client connection closed." . PHP_EOL;
    }
}
