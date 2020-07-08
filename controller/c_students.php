<?php 
	include('model/database.php');
	include('model/m_student.php');


$action=filter_input(INPUT_POST,'action');
if(empty($action)){
	$action =filter_input(INPUT_GET,'action');
	if(empty($action)){
		$action='show_students';
	}
 }

 switch ($action) {
 	case 'show_students':
 		$Student= new StudentDB();
 		$list_students=$Student->get_students();
 		include('view/student/list_student.php');
 		break;
 	case 'addnew':
 		include('view/student/add_student.php');
 		break;
 	case 'save_student':
 		$student=array();
 		$student['cardID']=filter_input(INPUT_POST,'cardID');
 		$student['name']=filter_input(INPUT_POST,'name');
 		$student['address']=filter_input(INPUT_POST,'address');
 		$student['tel']=filter_input(INPUT_POST,'tel');
 		$Student= new StudentDB();
 		
 		$Student->add_student($student);
 		// print_r($student);
 		$list_students=$Student->get_students();
 		include('view/student/list_student.php');
 		
 		break;

 	case 'delete':
		$cardID=filter_input(INPUT_GET,'cardID');
		$Student= new StudentDB();
		$Student->deletebook($cardID);
		$list_students=$Student->get_students();
 		include('view/student/list_student.php');
		break;
 	case 'edit':
 		$cardID=filter_input(INPUT_GET,'cardID');
 		$Student= new StudentDB();
 		$students=$Student->get_students_by_cardid($cardID);
 		
 		include('view/student/update_student.php');

 		break;
 	case 'update_student':
 		$student=array();
 		$students['cardID'] = filter_input(INPUT_POST,'cardID');
 		$students['name'] = filter_input(INPUT_POST,'name');
 		$students['address'] = filter_input(INPUT_POST,'address');
 		$students['tel'] = filter_input(INPUT_POST,'tel');
 		$Student= new StudentDB();
 		$Student->update_student($students);
 		$list_students=$Student->get_students();
 		include('view/student/list_student.php');
 		break;
 	case 'search_student':
 		$search_value=filter_input(INPUT_POST,'search_value');
 		$Student= new StudentDB();
 		$list_students=$Student->search_student($search_value);
 		// print_r($list_students);
 		include('view/student/list_student.php');
 		break;
 	default:
 		# code...
 		break;
 }



 ?>