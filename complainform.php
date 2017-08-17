
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"  />
<title>Form Example</title>
</head>

<body>
	
<h3>user is <?php
$userId = $_GET["userId"];
echo $_GET["userId"]; ?>	</h3>
	
	
<p>example input</p>
<form id="form1" name="form1" method="post" action="replyComplainform.php">
<p>เรื่อง
<input name="subject" type="text" id="subject" size="50" />
<br />
รายละเอียด
<input name="detail" type="text" id="detail" size="80" />
<br />
<input type="submit" name="Submit" value="Submit" />
</p>
<input type="hidden" name="user" value="<?php echo $userId; ?>"> 
</form>
 
<p>&nbsp; </p>

	
	
</body>
</html>
