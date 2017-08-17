<?php 
function initial($paramurl){
	//$url = 'https://myfirstfirebase-3f424.firebaseio.com/FirstBase.json';
	$url = $paramurl;
	$ch = curl_init($url);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	$result = '{"-KrZSSNlgrf2xQAXSuWi":{"U614bbdc142f4207ead2ba6d517aa4ee3":{"c9372021a17a4e95a5106c5672f95515":"hello"}},"-KrZST6jVIw3_uhYc6kV":{"U614bbdc142f4207ead2ba6d517aa4ee3":{"2a9b72c6d33e4bf79289604b768fe214":"my name is poteii"}},"-KrZSUqaHNCrPfaaGrz1":{"U614bbdc142f4207ead2ba6d517aa4ee3":{"8c89e7cb7276417398bc11fae392a0ab":"it have some problem"}},"-KrZlve_0Lq2vFFLN0Qu":{"U614bbdc142f4207ead2ba6d517aa4ee3":{"040fac8bfc10484f8bfc4c386d4d9009":"สวัสดีค่ะ คุณ U614bbdc142f4207ead2ba6d517aa4ee3"}},"-KrZlyxqgZXUPLo_ZepP":{"U614bbdc142f4207ead2ba6d517aa4ee3":{"3e1d370b961b43b293e090179cb82d38":"เทสๆๆๆ 555"}},"-KrZmD-zxTTQJrQfmQQS":{"U614bbdc142f4207ead2ba6d517aa4ee3":{"9c5834d27c03463fa72ed74b792428a3":"กรุณากรอกรายละเอียดตามนี้ https://devsbottext.herokuapp.com/input.html"}},"-KrZmQiap438FcR-_s1O":{"U3f82b30cbdd8ae1150bcf86d33e47b08":{"44311e53c5874360a54f76fff48f77c6":"5"}},"-Krdu5EPy2TfmMPCTxrn":{"Udeadbeefdeadbeefdeadbeefdeadbeef":{"00000000000000000000000000000000":"Hello,world"}},"-KrdvFNd5GYAmU_Cd-re":{"U614bbdc142f4207ead2ba6d517aa4ee3":{"2ecf8286e7d740359ad01046756810c4":"กรุณากรอกรายละเอียดตามนี้ https://devsbottext.herokuapp.com/input.html?id=U614bbdc142f4207ead2ba6d517aa4ee3"}},"-KrdvmWQTHvPofWmM0L9":{"U614bbdc142f4207ead2ba6d517aa4ee3":{"cc4e74316b964a12b8a3e4d8d0fc5f73":"กรุณากรอกรายละเอียดตามนี้ https://devsbottext.herokuapp.com/input.html?id=U614bbdc142f4207ead2ba6d517aa4ee3"}},"-Krdx_tNEKdNESoUruBv":{"U614bbdc142f4207ead2ba6d517aa4ee3":{"e6ad0c8360e944fd968fb3b6d8e207ab":"กรุณากรอกรายละเอียดตามนี้ https://devsbottext.herokuapp.com/input.html?id=U614bbdc142f4207ead2ba6d517aa4ee3"}}}';

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