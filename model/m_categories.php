<?php 
class CategoryDB{
	public function get_categories(){
		$db = Database::getDB();
		try{
			$query ="select * from categories";
			$statement=$db->prepare($query);
			$statement->execute();
			$books=$statement->fetchAll();
			return($books);
		} catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function get_category_by_categoryid($categoryID){
		$db= Database::getDB();
		try{ 
			$query ="select * from categories
			where categoryID=?";
			$statement=$db->prepare($query);
			$statement->bindParam(1, $categoryID);
			$statement->execute();
			$category=$statement->fetch();
			return($category);
		} catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function add_category($category){
		$db = Database::getDB();
		try {
			$query = "insert into categories(categoryID,categoryName, moreinfo)
			VALUES(?,?,?)";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$category['categoryID']);
			$statement->bindParam(2,$category['categoryName']);
			$statement->bindParam(3,$category['moreinfo']);

			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}

	}
	public function deleteCategory($CategoryID){
		$db = Database::getDB();
		try {
			$query="delete from categories where categoryID=?";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$CategoryID);
			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function update_category($category){
		$db = Database::getDB();

		$query='update categories set categoryName=?,moreinfo=?
		WHERE categoryID=?';
		try {
			$statement=$db->prepare($query);
			$statement->bindParam(1,$category['categoryName']);
			$statement->bindParam(2,$category['moreinfo']);
			$statement->bindParam(3,$category['categoryID']);

			$result = $statement->execute();
			return $result;
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	


}


?>