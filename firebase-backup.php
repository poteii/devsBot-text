<?php
$url = 'https://myfirstfirebase-3f424.firebaseio.com/FirstBase.json';
//$arr = array("TEST" =>array("test"=>array("a"=>123)));  
//$data_string = json_encode($arr);

$ch = curl_init($url);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
/*curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($data_string))
);*/
$result = curl_exec($ch);
$arr_result = regenerateArray($result);
echo 'มันจะเอาตัวสุดท้ายเพราะ key จะเป็น key เดียวกัน คือ userid <br/>';
foreach($arr_result as $key => $v){
	echo 'user: <b>'.$key . '</b> send this message [' . $v . ']<br/>';
}

function regenerateArray($result){
$resarray = json_decode($result,true);
$arr;
$arr2;
//print_r($resarray);
$index = 0;
foreach($resarray as $key => $value){
	foreach($value as $k => $val){
		$arr[$index] = array($k=>$val);
		$arr2[$k] = $val;
		$index++;
	}
}

$arr3;
foreach($arr2 as $key => $value){
	foreach($value as $v){
	$arr3[$key] = $v;
	}
}

	return $arr3;
}

?>
