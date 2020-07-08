<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			body{
				width:1200px;
				margin:0 auto;
			}
			
			
			
		</style>
	</head>
	<body>
		<h1 class="text-center">List Receipt</h1>
		<a href="?controller=main"><button type="button" class="btn btn-default">Home</button></a>
		<a href="?controller=receipt"><button type="button" class="btn btn-default">Back</button></a> <br>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th colspan="2"> Card ID: <?php echo $student['cardID']; ?></th>
						<th colspan="2"> Name: <?php echo $student['name']; ?></th>
						<th colspan="2"> Address: <?php echo $student['address']; ?></th>
						<th> Tel: <?php echo $student['tel']; ?></th>
					</tr>
					<tr>
						<th>No</th>
						<th>Book ID</th>
						<th>Book Name</th>
						<th>Author</th>
						<th>Publisher</th>
						<th>DateBorrow</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if(isset($_SESSION[$cardID])): ?>
					<?php foreach ($_SESSION[$cardID] as $key => $value) : ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value['bookID'] ?></td>
						<td><?php echo $value['name'] ?></td>
						<td><?php echo $value['author'] ?></td>
						<td><?php echo $value['publisher'] ?></td>
						<td><?php echo $value['dataBorrow'] ?></td>
						<td><a href="?controller=receipt&action=delete&cardID=<?php echo $cardID;?>&id=<?php echo $key; ?>" title="">Delete</a></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
				</tbody>
			</table>
			<form action="" method="POST">	
				<input type="hidden" name="cardID" value="<?php echo $cardID;?>">	
				<button type="submit" name="action" value="receipt_book" class="btn btn-primary">Submit</button>
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