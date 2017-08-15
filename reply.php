<?php
$access_token = 'nh7BWpnKFdxiz9UTcB3HttsbbBC9DIxMHeQUGznWDqLQ6yAyM9iyYSqn6BO4Yg+6NxNqZA3ZDmcu/1O7RTO0SL4vUdQdoTgOkQCVJP8Qm5O2ivj40/ezbv/n51ekqhaFUGl47j8Yvx8ChjaEhfH/DAdB04t89/1O/w1cDnyilFU=';
$messages="test reply message";
// Make a POST Request to Messaging API to reply to sender
    $url = 'https://api.line.me/v2/bot/message/push';
    $data = [
        'to' => 'U614bbdc142f4207ead2ba6d517aa4ee3',
        'messages' => $messages,
    ];
    $post = json_encode($data);
    $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    echo $result . "\r\n";
?>
