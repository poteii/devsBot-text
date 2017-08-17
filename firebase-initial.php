<?php 
function initial($paramurl){
	//$url = 'https://myfirstfirebase-3f424.firebaseio.com/FirstBase.json';
	$url = $paramurl;
	$ch = curl_init($url);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	$result = curl_exec($ch);

	return $result;

}

function generateUsers($result){
		$resarray = json_decode($result,true);
		$arr;
		$arr2;
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
		/*echo 'มันจะเอาตัวสุดท้ายเพราะ key จะเป็น key เดียวกัน คือ userid <br/>';
		foreach($arr3 as $key => $v){
			echo 'user: <b>'.$key . '</b> send this message [' . $v . ']<br/>';
		}*/
		return $arr3;
}

function displayUsers($users){
		$userstr = '';
		$br = '&#13;&#10;';
		foreach($users as $key => $v){
		 $userstr .= 'user: '.$key . ' send the message [' . $v . '] '. $br;
		}
		return $userstr;
}

function generateSelectOption($arr){
	foreach($arr as $key => $v){
		 echo '<option>'.$key . '</option>';
	}
}
?>
