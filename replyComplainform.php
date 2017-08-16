
<?php
include 'complainform.php';
$fburl = 'https://myfirstfirebase-3f424.firebaseio.com/FirstBase.json';
$fbarr = array($userId => array($subject => $detail));  
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
?>
