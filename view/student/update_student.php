<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Update book</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">Update book</h1>
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<label>Card ID</label>
					<input name="cardID" type="text" class="form-control" id="" placeholder="Input field" readonly value="<?php echo $students['cardID']; ?>">
					<label>Name</label>
					<input name="name" type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $students['name']; ?>">
					<label>Address</label>
					<input name="address" type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $students['address'] ?>">
					<label>Tel</label>
					<input name="tel" type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $students['tel'] ?>">

				</div>
			
				
			
				<button name="action" value="update_student" type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>