<?php

// Define the QOTD server's address and port
$serverAddress = '127.0.0.1';
$serverPort = 17;

// Establish a connection to the QOTD server
$socket = stream_socket_client("tcp://$serverAddress:$serverPort", $errno, $errstr, 30);

// Check if the connection was successful
if (!$socket) {
    echo "Error: $errno - $errstr";
} else {
    // Read the quote from the server
    $quote = fgets($socket);

    // Close the connection
    fclose($socket);

    // Output the quote
    echo "Quote of the Day: $quote";
}
