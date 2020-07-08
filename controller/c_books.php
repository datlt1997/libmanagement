<?php 
include('model/database.php');
include('model/m_book.php');
include('model/m_categories.php');
$action=filter_input(INPUT_POST,'action');
if(empty($action)){
	$action =filter_input(INPUT_GET,'action');
	if(empty($action)){
		$action='show_books';
	}
}
switch ($action) {
	case 'show_books':
	$BookDB=new BookDB();
	$list_book=$BookDB->get_books();
	include('view/book/list_book.php');
	break;
	case 'addnew':
	$CategoryDB= new CategoryDB();
	$categories=$CategoryDB->get_categories();
	include('view/book/addbook.php');
	break;
	case 'savebook':
	$book =array();
	$book['bookID']=filter_input(INPUT_POST,'bookID');
	$book['name']=filter_input(INPUT_POST,'name');
	$book['publisher']=filter_input(INPUT_POST,'publisher');
	$book['author']=filter_input(INPUT_POST,'author');
	$book['categoryID']=filter_input(INPUT_POST,'categoryID');
	$book['numOfPage']=filter_input(INPUT_POST,'numOfPage');
	$book['maxdate']=filter_input(INPUT_POST,'maxdate');
	$book['num']=filter_input(INPUT_POST,'num');
	$book['summary']=filter_input(INPUT_POST,'summary');
	$book['picture']=filter_input(INPUT_POST,'picture');

			//Xử lý luu ảnh trên server
	$image_dir_path=getcwd().'/public/image';
	if(isset($_FILES['picture'])){
		$filename=$_FILES['picture']['name'];
		if(!empty($filename)){
			$source=$_FILES['picture']['tmp_name'];
			$taget=$image_dir_path.'/'.$filename;
			move_uploaded_file($source,$taget);
			$book['picture']=$filename;
		}
	}else{
		$book['picture']="";
	}
	$BookDB=new BookDB();
	$BookDB->addbook($book);


	
	$list_book=$BookDB->get_books();
	include('view/book/list_book.php');
	break;
	case 'delete':
	$bookID=filter_input(INPUT_GET,'bookID');
	$BookDB= new BookDB();

	$BookDB->deletebook($bookID);
	$list_book=$BookDB->get_books();
	include('view/book/list_book.php');
	break;
	case 'edit':
	$bookID=filter_input(INPUT_GET,'bookID');
	$BookDB= new BookDB();
	$CategoryDB= new CategoryDB();
	$book=$BookDB->get_book_by_bookid($bookID); 


	$categories=$CategoryDB->get_categories();
	include('view/book/update.php');
	break;
	case 'update_book':
	$book=array();
	$book['bookID']=filter_input(INPUT_POST,'bookID');
	$book['name']=filter_input(INPUT_POST,'name');
	$book['publisher']=filter_input(INPUT_POST,'publisher');
	$book['author']=filter_input(INPUT_POST,'author');
	$book['categoryID']=filter_input(INPUT_POST,'categoryID');
	$book['numOfPage']=filter_input(INPUT_POST,'numOfPage');
	$book['maxdate']=filter_input(INPUT_POST,'maxdate');
	$book['num']=filter_input(INPUT_POST,'num');
	$book['summary']=filter_input(INPUT_POST,'summary');
	$book['picture']=filter_input(INPUT_POST,'old_picture');
			// xử lí ảnh
	$image_dir_path=getcwd().'/public/image';
	if(isset($_FILES['picture'])){
		$filename=$_FILES['picture']['name'];
		if(!empty($filename)){
			$source=$_FILES['picture']['tmp_name'];
			$taget=$image_dir_path.'/'.$filename;
			move_uploaded_file($source,$taget);
			$book['picture']=$filename;
		}
	}
	$BookDB= new BookDB();
	$BookDB->update_book($book);

	$list_book=$BookDB->get_books();
	include('view/book/list_book.php');
	break;

	case 'search_book':
	$search_value=filter_input(INPUT_POST,'search_value');
	$BookDB= new BookDB();
	$list_book=$BookDB->search_book($search_value); 
	// print_r($list_book);
	include('view/book/list_book.php');
	break;



	
	default:
		# code...
	break;
}






?>