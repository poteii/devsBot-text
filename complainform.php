
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Form Example</title>
</head>

<body>
<div class="container">	
<h3>user is <?php
$userId = $_GET["userId"];
echo $_GET["userId"]; ?>	</h3>
	
	
<p>example input</p>
<form id="form1" name="form1" method="post" action="replyComplainform.php">
	
	<div class="row">
<div class="col-sm-4">
<p>เรื่อง
<input class="form-control" name="subject" type="text" id="subject" size="50" />
<br />
รายละเอียด
<input class="form-control" name="detail" type="text" id="detail" size="80" />
<br />
<input class="btn btn-primary" type="submit" name="Submit" value="Submit" />
</p>
<input  type="hidden" name="user" value="<?php echo $userId; ?>"> 
</div>
	</div>
	
</form>
 </div>
<p>&nbsp; </p>

	
	
</body>
</html>
