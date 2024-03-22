<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Here you can perform any server-side processing
    // For example, you can log the request, update a database, or perform any other task

    // For demonstration purposes, let's simply send a response
    echo "Meeting joined successfully!";
} else {
    // If the request method is not POST, return an error message
    http_response_code(405); // Method Not Allowed
    echo "Error: Only POST requests are allowed.";
}
?>
