<?php
$access_token = 'nh7BWpnKFdxiz9UTcB3HttsbbBC9DIxMHeQUGznWDqLQ6yAyM9iyYSqn6BO4Yg+6NxNqZA3ZDmcu/1O7RTO0SL4vUdQdoTgOkQCVJP8Qm5O2ivj40/ezbv/n51ekqhaFUGl47j8Yvx8ChjaEhfH/DAdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data

if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		$userId = $event['source']['userId'];
		$text = "";
		$replyToken = "";
		$url = 'https://api.line.me/v2/bot/profile/'.$userId;
		$headers1 = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		$ch1 = curl_init();
		curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers1);
		curl_setopt($ch1,CURLOPT_URL,$url);
		curl_setopt($ch1,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch1,CURLOPT_CONNECTTIMEOUT,10);
		$data = curl_exec($ch1);
		curl_close($ch1);
		$profile = json_decode($data);
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			if(strstr($event['message']['text'], 'สวัสดี')){
				// Get text sent
				
				$text = "สวัสดีค่ะ คุณ ".$profile['displayName'];
			}else if(strstr($event['message']['text'], 'ร้องเรียน') ||  strstr($event['message']['text'], 'ปัญหา')){
				$text = "กรุณากรอกรายละเอียดตามนี้ https://devsbottext.herokuapp.com/complainform.php?userId=".$event['source']['userId'];
			}else{
				$text = $event['message']['text'];
			}
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
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
			
			
			$fburl = 'https://myfirstfirebase-3f424.firebaseio.com/FirstBase.json';
			$fbarr = array($userId => array($replyToken => $text));  
			$fbdata_string = json_encode($fbarr);
			$fbch = curl_init($fburl);
			curl_setopt($fbch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($fbch, CURLOPT_POSTFIELDS, $fbdata_string);
			curl_setopt($fbch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($fbch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($fbch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($fbch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($fbdata_string))
			);
			$fbresult = curl_exec($fbch);
			
		}else{
		
			// Get text sent
			$text = "อย่าส่งสติ๊กเกอร์มาสิ เอาข้อความ";
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
		
		
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
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
	}
}
