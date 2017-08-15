<?php
$url = 'https://myfirstfirebase-3f424.firebaseio.com/FirstBase.json';
$arr = array("TEST" =>array("iPhone"=>500,"HTC"=>100));  
$data_string = json_encode($arr);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($data_string))
);
echo $result = curl_exec($ch);
?>
