<?php include('firebase-initial.php');
$users_str = initial('https://myfirstfirebase-3f424.firebaseio.com/FirstBase.json');
$result = generateUsers($users_str);
$result_str = displayUsers($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LineMsgApi|PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form method="post" action="process.php">
<div class="container-fluid">
  <h1>Line Message API Server side</h1>
  <p>Send Line message to specific users.</p>
  <div class="row">
     <div class="col-sm-5">
    	<label for="users">Plaintext from firebase:</label>
	     <textarea class="form-control"  id="users" rows="5" disabled="true">
	     <?php echo $result_str; ?>
	     </textarea>
    </div>
    <div class="col-sm-7"></div>
  </div>
  <div class="row">
     <div class="col-sm-5">
    	<label for="sel2">Please select UserId:</label>
	      <select multiple class="form-control" id="sel2" name="sel2[]">
	        <?php generateSelectOption($result); ?>
	      </select>
    </div>
    <div class="col-sm-7"></div>
  </div>
   <div class="row">
     <div class="col-sm-5">
    	<label for="msg">Message:</label>
	      <input type="text" class="form-control" id="msg" name="msg">
    </div>
    <div class="col-sm-7"></div>
  </div>
  <div class="row">
  <div class="col-sm-5">
    	<input type="submit" value="Submit" class="btn btn-primary"></input>
    </div>
    <div class="col-sm-7"></div>
  	
  </div>
</div>
</form>
</body>
</html> 
