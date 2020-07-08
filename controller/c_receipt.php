<?php 
// $lifetime=2*24*3600;
// session_set_cookie_params($lifetime,'/');
// session_start();
include('model/database.php');
include_once('model/m_book.php');
include('model/m_categories.php');
include_once('model/m_student.php');
include_once('model/m_receipt.php');
$action=filter_input(INPUT_POST,'action');
if(empty($action)){
	$action =filter_input(INPUT_GET,'action');
	if(empty($action)){
		$action='show_receipt';
	}
}
$cardID="";
$message_error="";
$student=array('cardID'=>'','name'=>'','address'=>'','tel'=>'');
switch ($action) {
	case 'show_receipt':
	include('view/receipt/receipt_book.php');
	break;

	case 'add_borrow_book':
	$cardID=filter_input(INPUT_POST,'cardID');
	$bookID =filter_input(INPUT_POST,'bookID');
	$bookDB=new BookDB();
	$book= $bookDB->get_book_by_bookid($bookID);
	$dateborrow= date("Y-m-d H:i:s");

	if(StudentDB::check_cardID($cardID)){
		$student= StudentDB::get_students_by_cardid($cardID);
		if(BookDB::check_bookID($bookID)){
			$_SESSION[$cardID][] = array(
				'bookID' => $book['bookID'], 
				'name' => $book['name'], 
				'author' => $book['author'], 
				'publisher' => $book['publisher'], 
				'dataBorrow' => $dateborrow);	
		}else{
			if(empty($bookID)){
				$message_error="BookID không tồn tại";
			}else{
				$message_error="BookID: $bookID không tồn tại";
			}			
		}
	} else{
		if(empty($bookID)){
			$message_error="CardID không tồn tại";
		}else{
			$message_error="CardID: $cardID không tồn tại";
		}		
	}
	
	include('view/receipt/receipt_book.php');
	break;
	
	case 'delete':	
	$cardID= filter_input(INPUT_GET,'cardID');
	$id= filter_input(INPUT_GET,'id');
	unset($_SESSION[$cardID][$id]);
	$_SESSION[$cardID]=array_values($_SESSION[$cardID]);
	include('view/receipt/receipt_book.php');

	break;

	case 'receipt_book':
		$cardID= filter_input(INPUT_POST,'cardID');
		$dateborrow= date("Y-m-d H:i:s");
		foreach ($_SESSION[$cardID] as $key => $value) {
			$receipt=array(
				'cardID'=>$cardID,
				'bookID'=>$value['bookID'],
				'dateBorrow' => $dateborrow);
			ReceiptDB::receipt_book($receipt);

		}
		unset($_SESSION[$cardID]);
		include('view/receipt/receipt_book.php');
		break;
	case 'showborrow':
	break;
	default:
		# code...
	break;
}

?>