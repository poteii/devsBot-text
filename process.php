<?php
/*
$selected_users = $_POST['sel2'];
$message = $_POST['msg'];
echo $message.'<br/>';

//include 'input.php';
$access_token = 'nh7BWpnKFdxiz9UTcB3HttsbbBC9DIxMHeQUGznWDqLQ6yAyM9iyYSqn6BO4Yg+6NxNqZA3ZDmcu/1O7RTO0SL4vUdQdoTgOkQCVJP8Qm5O2ivj40/ezbv/n51ekqhaFUGl47j8Yvx8ChjaEhfH/DAdB04t89/1O/w1cDnyilFU=';

$messages = [
				'type' => 'text',
				'text' => $message
			];
// Make a POST Request to Messaging API to reply to sender


foreach($selected_users as $value){
	echo $value;
    $url = 'https://api.line.me/v2/bot/message/push';
    $data = [
        'to' => $value,
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
header('Location: ' . $_SERVER['HTTP_REFERER']);
*/
$message = $_POST['msg'];
echo $message.'<br/>';
$strAccessToken = 'nh7BWpnKFdxiz9UTcB3HttsbbBC9DIxMHeQUGznWDqLQ6yAyM9iyYSqn6BO4Yg+6NxNqZA3ZDmcu/1O7RTO0SL4vUdQdoTgOkQCVJP8Qm5O2ivj40/ezbv/n51ekqhaFUGl47j8Yvx8ChjaEhfH/DAdB04t89/1O/w1cDnyilFU=';
//$strAccessToken = "ACCESS_TOKEN";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
