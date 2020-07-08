<?php 
include('model/database.php');
include('model/m_login.php');
$action=filter_input(INPUT_POST,'action');
if(empty($action)){
	$action =filter_input(INPUT_GET,'action');
	if(empty($action)){
		$action='check_session';
	}
}
switch ($action) {
	case 'check_session':
		if(isset($_SESSION['admin'])){
			$user=array('username'=>$_SESSION['admin']['username'],'password'=>$_SESSION['admin']['password']);
			if(AdminDB::check_login($user)){
				$lavel=AdminDB::get_lavel_by_user($user['username']);
				include('view/main/master.php');
				break;
			}
			else{
				include_once('view/main/login.php');
			}
		}
		break;
	case 'check_login':
		$username =filter_input(INPUT_POST,'username');
		$password=md5(filter_input(INPUT_POST,'password'));
		$user=array('username'=>$username,'password'=>$password);
		if(AdminDB::check_login($user)){
			$_SESSION['admin']['username']=$username;
			$_SESSION['admin']['password']=$password;
			echo " login sussess";
			$lavel=AdminDB::get_lavel_by_user($username);
			include('view/main/master.php');
		}
		else{
			echo "user or pass invalid";
			include_once('view/main/login.php');
		}
		break;
	case 'show_user':
		$AdminDB=new AdminDB();
		$list_user=$AdminDB->get_users();
		include('view/main/list_user.php');
		break;	
	case 'addnew':
		include('view/main/add_user.php');
		break;
	case 'save_user':
		$user=array();
 		$user['id']=filter_input(INPUT_POST,'id');
 		$user['username']=filter_input(INPUT_POST,'username');
 		$user['password']=md5(filter_input(INPUT_POST,'password'));
  		$user['name']=filter_input(INPUT_POST,'name');
  		$user['lavel']=filter_input(INPUT_POST,'lavel');
		
 		$admin=new AdminDB();
 		$admin->add_user($user);
 		$list_user=$admin->get_users();
		include('view/main/list_user.php');
		break;
	case 'edit':
 		$userID=filter_input(INPUT_GET,'ID');
 		$admin=new AdminDB();
 		$user_update=$admin->get_user_by_id($userID); 		
 		include('view/main/update_user.php');
 		break;
 	case 'update_user':
 		$user=array();
 		$user['id']=filter_input(INPUT_POST,'id');
 		$user['username']=filter_input(INPUT_POST,'username');
 		$user['password']=md5(filter_input(INPUT_POST,'password'));
  		$user['name']=filter_input(INPUT_POST,'name');
  		$user['lavel']=filter_input(INPUT_POST,'lavel');

  		$admin=new AdminDB();
 		$admin->update_user($user);
 		$list_user=$admin->get_users();
		include('view/main/list_user.php');
 		break;
 	case 'delete':
		$userID=filter_input(INPUT_GET,'ID');
		$admin=new AdminDB();
		$admin->delete_user($userID);
		$list_user=$admin->get_users();
		include('view/main/list_user.php');
		break;


	case 'logout':
		unset($_SESSION['admin']);
		include_once('view/main/login.php');
		break;


	default:

	break;
}










?>