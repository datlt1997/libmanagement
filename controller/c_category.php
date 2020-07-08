<?php 
	include('model/database.php');
	include('model/m_categories.php');


$action=filter_input(INPUT_POST,'action');
if(empty($action)){
	$action =filter_input(INPUT_GET,'action');
	if(empty($action)){
		$action='show_category';
	}
 }

 switch ($action) {
 	case 'show_category':
 		$category= new CategoryDB();
 		$list_category=$category->get_categories();
 		include('view/category/list_category.php');
 		break;
 	case 'addnew':
 		include('view/category/add_category.php');
 		break;
 	case 'savecategory':
 		$cate=array();
 		$cate['categoryID']=filter_input(INPUT_POST,'categoryID');
 		$cate['categoryName']=filter_input(INPUT_POST,'categoryName');
 		$cate['moreinfo']=filter_input(INPUT_POST,'moreinfo');
 		$category= new CategoryDB();
 		// print_r($cate);
 		$category->add_category($cate);
 		

 		$list_category=$category->get_categories();
 		
 		include('view/category/list_category.php');
 		
 		break;

 	case 'delete':
		$categoryID=filter_input(INPUT_GET,'categoryID');
		$Category= new CategoryDB();
		$Category->deleteCategory($categoryID);

		$list_category=$Category->get_categories();
 		include('view/category/list_category.php');
		break;
 	case 'edit':
 		$categoryID=filter_input(INPUT_GET,'categoryID');
 		$category= new CategoryDB();
 		$categories=$category->get_category_by_categoryid($categoryID);
 		
 		include('view/category/update_category.php');

 		break;
 	case 'update_category':
 		$categories=array();
 		$categories['categoryID'] = filter_input(INPUT_POST,'categoryID');
 		$categories['categoryName'] = filter_input(INPUT_POST,'categoryName');
 		$categories['moreinfo'] = filter_input(INPUT_POST,'moreinfo');
 	
 		$category= new CategoryDB();
 		$category->update_category($categories);
 		$list_category=$category->get_categories();
 		include('view/category/list_category.php');
 		break;

 	default:
 		# code...
 		break;
 }



 ?>