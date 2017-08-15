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
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			if($event['message']['text'] == "สวัสดี"){
				// Get text sent
				$text = "สวัสดีค่ะ คุณ ".$event['source']['userId'];
			}else if($event['message']['text'] == "ร้องเรียน"){
				// Get text sent
				$text = "ต้องการร้องเรียนเรื่องคอมพิวเตอร์กด 1 \n ต้องการร้องเรียนเรื่องพนักงานกด 2";
			}else if($event['message']['text'] == "1"){
				// Get text sent
				$text = "กรุณากรอกรายละเอียดดังนี้ 1.รุ่น 2.วันที่เกิดปัญหา 3.สถานที่";
			}else if($event['message']['text'] == "2"){
				// Get text sent
				$text = "กรุณาระบุรายละเอียดดังนี้ 1.ชื่อเจ้าหน้าที่ 2.วันที่เกิดปัญหา 3.เบอร์ติดต่อกลับ";
			}else if(strstr($event['message']['text'], 'ขอแจ้ง')){
				$text = "กรุณากรอกรายละเอียดตามนี้ https://devsbottext.herokuapp.com/input.html";
				
				
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
			
		/*	
			$firebaseurl = 'https://myfirstfirebase-3f424.firebaseio.com/FirstBase.json';
			$firebasearr = array($event['source']['userId'] =>array($event['message']['text']);  
			$firebasedata_string = json_encode($firebasearr);
			$firebasech = curl_init($firebaseurl);
			curl_setopt($firebasech, CURLOPT_CUSTOMREQUEST, "PATCH");
			curl_setopt($firebasech, CURLOPT_POSTFIELDS, $firebasedata_string);
			curl_setopt($firebasech, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($firebasech, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($firebasech, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($firebasech, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($firebasedata_string))
			);
			echo $firebaseresult = curl_exec($firebasech);
		*/	
			
			
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
