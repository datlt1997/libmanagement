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
					<label>Book ID</label>
					<input name="bookID" type="text" class="form-control" id="" placeholder="Input field" readonly value="<?php echo $book['bookID']; ?>">
					<label>Name</label>
					<input name="name" type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $book['name'] ?>">
					<label>Publisher</label>
					<input name="publisher" type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $book['publisher'] ?>">
					<label>Authur</label>
					<input name="author" type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $book['author'] ?>">

					<label>Category ID</label>
					<select name="categoryID" id="inputCategoryID" class="form-control" required="required" >
						<?php foreach ($categories as $key => $value): ?>
							
						<option value="<?php echo $value['categoryID'];?>"><?php echo $value['categoryName']; ?></option>
						<?php endforeach; ?>
					</select>

					<label>Num Of Page</label>
					<input name="numOfPage" type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $book['numOfPage'] ?>">
					<label>Max Date</label>

					<input name="maxdate" type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $book['maxdate'] ?>">
					<label>Num</label>
					<input name="num" type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $book['num'] ?>">
					<label>Summary</label>
					<input name="summary" type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $book['summary'] ?>">
					<label>Picture</label>
					<input name="picture" type="file" class="form-control">
					<input type="hidden" name="old_picture" value="<?php echo $book['picture']?>">
				</div>
			
				
			
				<button name="action" value="update_book" type="submit" class="btn btn-primary">Add</button>
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