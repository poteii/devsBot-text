<?php
include 'input.php';
include 'firebase.php';
$access_token = 'nh7BWpnKFdxiz9UTcB3HttsbbBC9DIxMHeQUGznWDqLQ6yAyM9iyYSqn6BO4Yg+6NxNqZA3ZDmcu/1O7RTO0SL4vUdQdoTgOkQCVJP8Qm5O2ivj40/ezbv/n51ekqhaFUGl47j8Yvx8ChjaEhfH/DAdB04t89/1O/w1cDnyilFU=';

$messages = [
				'type' => 'text',
				'text' => "Hello, world"
			];
// Make a POST Request to Messaging API to reply to sender


$returl = 'https://myfirstfirebase-3f424.firebaseio.com/FirstBase.json';
$retch = curl_init($returl);
curl_setopt( $retch, CURLOPT_RETURNTRANSFER, true );
$result = curl_exec($retch);
$receivers = regenerateArray($result);
foreach($receivers as $key => $value){
	echo $value;
    $url = 'https://api.line.me/v2/bot/message/push';
    $data = [
        'to' => $key,
        'messages' => [$messages],
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
}
?>
