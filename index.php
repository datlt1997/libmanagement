<?php 
// $lifetime=2*60*60;
// $path='';
// session_set_cookie_params($lifetime,$path);
// session_start();
$controller=filter_input(INPUT_POST,'controller');
if (empty($controller)) {
	$controller=filter_input(INPUT_GET,'controller');
	if (empty($controller)) {
		$controller='login';
	}
}

if(!isset($_SESSION['admin']['username'])||(!isset($_SESSION['admin']['password']))){
	// include('view/main/login.php');
	include('controller/c_login.php');
	// echo $_SESSION['admin']['username'];
}
else{

	switch ($controller) {
	case 'main':
		include('view/main/master.php');
		break;
	case 'book':
		include('controller/c_books.php');
		break;
	case 'login':
		include('controller/c_login.php');
		break;
	case 'student':
		include('controller/c_students.php');
		break;
	case 'category':
		include('controller/c_category.php');
		break;
	case 'receipt':
		include('controller/c_receipt.php');
	default:
		# code...
		break;
}

}




// include("controller/c_books.php");
 ?>