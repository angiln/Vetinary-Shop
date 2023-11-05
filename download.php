<?php
// Your HTML content for the invoic

// Encode the HTML content
$encodedHtml = base64_encode($html);

// HTML to PDF API endpoint
$apiUrl = 'https://htmlpdfapi.com/api/v1/pdf';

// API key (sign up on the HTML to PDF API website to get one)
$apiKey = 'your_api_key_here';

// API request data
$data = array(
    'html' => $encodedHtml,
    'apiKey' => $apiKey,
);

// Send a POST request to the HTML to PDF API
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
curl_close($ch);

// Check if the API request was successful
if ($response === false) {
    die('Error sending API request');
}

// Decode the API response
$responseData = json_decode($response, true);

// Check if the API response contains a PDF URL
if (isset($responseData['pdfUrl'])) {
    // Redirect the user to the PDF download link
    header('Location: ' . $responseData['pdfUrl']);
    exit;
} else {
    die('Error generating PDF');
}
?>
