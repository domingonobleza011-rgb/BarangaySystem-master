<?php
session_start();
header('Content-Type: application/json');

// Pro-tip: Create a new key soon since this one was shared!
$apiKey = "AIzaSyB5ops4TNqxb2LlVbkafcQjNnEDD7q7jyo";

$apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.1-flash-lite-preview:generateContent?key=" . $apiKey;

// Get the user's message
$input = json_decode(file_get_contents('php://input'), true);
$userMessage = $input['message'] ?? '';

if (empty($userMessage)) {
    echo json_encode(['error' => 'No message provided']);
    exit;
}

// 1. Setup System Instructions
$systemContext = "You are a helpful assistant for the San Pedro Barangay Records System. 
Help users with questions about residency, clearances, and youth programs. 
Keep answers concise and professional.

PROCESS FOR REGISTERING:
Step 1: Go to the 'Resident Registration' page from the sidebar.
Step 2: Fill out the form with your Full Name, Birthdate, and Purok.
Step 3: Upload a valid ID for verification.
Step 4: Wait 24-48 hours for the Barangay Secretary to approve your account.

business permit
Step 1: Prepare
First step is to prepare all of the information that will be needed in acquiring a certificate of residency.
Step 2: Fill-Up
Second step is to Fill-Up the entire form in our system.
Step 3: Assessment
Third step is to verify all of the information you've been given in our system that we can use to make the information of your document accurately.
Step 4: Release
Fourth step is for releasing of your Business Permit. 

barangay Id

Step 1: Fill-Up
First step is to Fill-Up the entire form in our system.
Step 2: Assessment
Second step is to verify all of the information you've been given in our system that we can use to make the information of your document accurately.
Step 3: Release
Third step is for releasing of your document.

indigency certificate

Step 1: Fill-Up
First step is to Fill-Up the entire form in our system.
Step 2: Assessment
Second step is to verify all of the information you've been given in our system that we can use to make the information of your document accurately.
Step 3: Approval
Third step is to approve your document. Therefore, we dont have an issue when we release your document.
Step 4: Release
Fourth step is for releasing of your document.

blotter
Step 1: Fill-Up the entire form in our system.
Step 2: Verify all of the information you've been given in our system that we can use to solve your case as quick as possible.
Step 3: Approve your complain, so we can set a schedule or an appointment to make an agreement on bot sides.";

// 2. Prepare the Request Body
$data = [
    "contents" => [
        [
            "parts" => [
                ["text" => $systemContext . "\n\nUser Question: " . $userMessage]
            ]
        ]
    ],
    "generationConfig" => [
        "temperature" => 0.7,
        "maxOutputTokens" => 500
    ]
];

// 3. Send Request via cURL
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// --- SSL FIX FOR LOCAL DEVELOPMENT (LARAGON) ---
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
// -----------------------------------------------

$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

if ($err) {
    echo json_encode(['reply' => 'cURL Error: ' . $err]);
} else {
    $result = json_decode($response, true);
    
    // Check if Google sent an error message instead of a reply
    if (isset($result['error'])) {
        echo json_encode(['reply' => 'Google API Error: ' . $result['error']['message']]);
    } else {
        // The path to the text response in the JSON
        $botReply = $result['candidates'][0]['content']['parts'][0]['text'] ?? "I'm having trouble thinking right now.";
        echo json_encode(['reply' => $botReply]);
    }
}