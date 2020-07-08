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
				width: 1200px;
				margin:0 auto;
			}
			
		</style>
	</head>
	<body>
		<h1 class="text-center">book</h1>
		
		<form action="" method="POST">
			<div class="row">
			<div class="col-md-8">
			<input type="text" name="search_value" id="inputSearch_value" class="form-control" value=""  title="">	
			</div>
			<div class="col-md-4">
				<button type="submit" name="action" value="search_book" class="btn btn-default">Search</button>
			</div>
		</div>
		</form>
		<br>
		<a href="?controller=login"><button type="button" class="btn btn-default">Home</button></a>
		<a href="?controller=book&action=addnew"><button type="button" class="btn btn-default">Add New</button></a>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Book ID</th>
						<th>Name</th>
						<th>Publisher</th>
						<th>Authur</th>
						<th>Category ID</th>
						<th>Num Of Page</th>
						<th>Max Date</th>
						<th>Num</th>
						<th>Summary</th>
						<th>Picture</th>
						<th colspan="2">Option</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($list_book as $key => $value) : ?>
					<tr>
						<td><?php echo $value['bookID'] ?></td>
						<td><?php echo $value['name'] ?></td>
						<td><?php echo $value['publisher'] ?></td>
						<td><?php echo $value['author'] ?></td>
						<td><?php echo $value['categoryID'] ?></td>
						<td><?php echo $value['numOfPage'] ?></td>
						<td><?php echo $value['maxdate'] ?></td>
						<td><?php echo $value['num'] ?></td>
						<td><?php echo $value['summary'] ?></td>
						<td><img src="public/image/<?php echo $value['picture'] ?>" alt="picture" height="70"></td>
						<td><a href="?controller=book&action=edit&bookID=<?php echo $value['bookID']; ?>" title="">Update</a></td>
						<td><a href="?controller=book&action=delete&bookID=<?php echo $value['bookID']; ?>" title="">Delete</a></td>

						</tr>
					<?php endforeach; ?>
					
				</tbody>
			</table>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>