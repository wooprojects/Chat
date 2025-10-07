<?php
$bot_token = "8211985796:AAEYSO5w0xT-dNeFT8PTuqcntKGEmJWr9Wc";
$api_url = "https://api.telegram.org/bot" . $bot_token . "/";

// دریافت آپدیت‌ها از تلگرام
$update = json_decode(file_get_contents("php://input"), true);

if(isset($update['message'])) {
    $chat_id = $update['message']['chat']['id'];
    $text = $update['message']['text'];
    
    if($text == "/start") {
        $message = "سلام بده";
        send_message($chat_id, $message);
    }
}

function send_message($chat_id, $message) {
    global $api_url;
    
    $data = [
        'chat_id' => $chat_id,
        'text' => $message
    ];
    
    file_get_contents($api_url . "sendMessage?" . http_build_query($data));
}
?>
