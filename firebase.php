<?php
$url = 'https://myfirstfirebase-3f424.firebaseio.com/FirstBase.json';
$arr = array("TEST" =>array("test"=>array("a"=>123)));  
$data_string = json_encode($arr);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($ch);
?>
