<?php
header('Content-Type: application/json');

// POST နဲ့လာမှ အလုပ်လုပ်မယ်
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    $name = htmlspecialchars($input['username'] ?? '');
    $key = htmlspecialchars($input['userkey'] ?? '');

    if (empty($name)) {
        echo json_encode(['status' => 'error', 'message' => 'Username is required!']);
        exit;
    }

    // Key မပါရင် Auto ထုတ်ပေး
    if (empty($key)) {
        $key = substr(md5(time() . mt_rand()), 0, 10);
    }

    $file = 'user.json';
    $current_data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    if (!is_array($current_data)) $current_data = [];

    // Duplicate စစ်ခြင်း
    foreach ($current_data as $item) {
        if (($item['Key'] ?? '') === $key) {
            echo json_encode(['status' => 'error', 'message' => '❌ Key already exists!']);
            exit;
        }
    }

    // Data အသစ်ထည့်ခြင်း
    $new_user = [
        "Name" => $name,
        "Key" => $key,
        "Valid" => "1",
        "InfoMessage" => "2 Days Premium",
        "Expiration" => date('Y-m-d', strtotime('+2 days'))
    ];

    $current_data[] = $new_user;

    if (file_put_contents($file, json_encode($current_data, JSON_PRETTY_PRINT))) {
        echo json_encode(['status' => 'success', 'message' => "✅ Activated: $name"]);
    } else {
        echo json_encode(['status' => 'error', 'message' => '⚠️ Server Write Error!']);
    }
}
?>
