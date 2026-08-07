<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON data']);
    exit();
}

// Validate required fields
$required_fields = ['name', 'email', 'phone', 'event_type', 'date', 'guests', 'message'];
foreach ($required_fields as $field) {
    if (!isset($data[$field]) || empty(trim($data[$field]))) {
        http_response_code(400);
        echo json_encode(['error' => "Missing required field: $field"]);
        exit();
    }
}

// Add server-side timestamp and ID if not present
if (!isset($data['id'])) {
    $data['id'] = uniqid('inq_', true);
}
if (!isset($data['timestamp'])) {
    $data['timestamp'] = date('c'); // ISO 8601 format
}
if (!isset($data['status'])) {
    $data['status'] = 'new';
}

// Load existing data or create new structure
$dataFile = 'data.json';
$existingData = ['inquiries' => []];

if (file_exists($dataFile)) {
    $existingContent = file_get_contents($dataFile);
    if ($existingContent) {
        $existingData = json_decode($existingContent, true);
        if (!$existingData || !isset($existingData['inquiries'])) {
            $existingData = ['inquiries' => []];
        }
    }
}

// Check for duplicate submission (same email and event details within 5 minutes)
$duplicate = false;
$currentTime = time();
foreach ($existingData['inquiries'] as $inquiry) {
    if ($inquiry['email'] === $data['email'] &&
        $inquiry['event_type'] === $data['event_type'] &&
        $inquiry['date'] === $data['date'] &&
        isset($inquiry['timestamp'])) {

        $inquiryTime = strtotime($inquiry['timestamp']);
        if (($currentTime - $inquiryTime) < 300) { // 5 minutes
            $duplicate = true;
            break;
        }
    }
}

if ($duplicate) {
    http_response_code(409);
    echo json_encode(['error' => 'Duplicate submission detected']);
    exit();
}

// Add new inquiry
$existingData['inquiries'][] = $data;

// Save to file with pretty printing
$jsonData = json_encode($existingData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

if (file_put_contents($dataFile, $jsonData) === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to save data']);
    exit();
}

// Return success response
echo json_encode([
    'success' => true,
    'message' => 'Inquiry saved successfully',
    'id' => $data['id']
]);
?>
