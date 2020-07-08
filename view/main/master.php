<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hệ Thống Sách</title>

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
			
			<a href="?controller=login&action=logout" class="btn btn-info"> LogOut</a>
			<h1 class="text-center"> Hệ Thống Quản Lý Sách Thư Viện</h1>
			<div class="btn-group-vertical">
				<?php if($lavel['lavel']==0): ?>
					<h2>Xin chào admin</h2>
					<a class="btn btn-default" href="?controller=student" role="button">Quản Lý Thông Tin Bạn Đọc</a>
					<a class="btn btn-default" href="?controller=book" role="button">Quản Lý Thông Tin Sách</a>
					<a class="btn btn-default" href="?controller=category" role="button">Quản Lý Thể Loại</a>
					<a class="btn btn-default" href="?controller=receipt" role="button">Quản Lý Mượn Trả</a>
					<a class="btn btn-default" href="?controller=login&action=show_user" role="button">Quan Ly Người Dùng</a>
				<?php endif; ?>
				<?php if ($lavel['lavel']==1) :?>
					<h2>Xin chào cấp 1</h2>
					<a class="btn btn-default" href="?controller=book" role="button">Quản Lý Thông Tin Sách</a>
					<a class="btn btn-default" href="?controller=category" role="button">Quản Lý Thể Loại</a>
					<a class="btn btn-default" href="?controller=receipt" role="button">Quản Lý Mượn Trả</a>
					<a class="btn btn-default" href="?controller=student" role="button">Quản Lý Thông Tin Bạn Đọc</a>
				<?php endif; ?>

				<?php if ($lavel['lavel']==2): ?>
					<h2>Xin chào cấp 2</h2>
					<a class="btn btn-default" href="?controller=student" role="button">Quản Lý Thông Tin Bạn Đọc</a>		
				<?php endif; ?>
				</div>
			</div>

		</body>
		</html>