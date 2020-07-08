<?php 
// function get_students(){
// 	global $db;
// 	try{
// 		$query ="select * from students";
// 		$statement=$db->prepare($query);
// 		$statement->execute();
// 		$students=$statement->fetchAll();
// 		return $students;
// 	} catch(PDOException $e){
// 		$error_message=$e->getMessage();
// 		echo "database error:$error_message ";
// 		exit();
// 	}
// }
// function get_students_by_cardid($cardid){
// 	global $db;
// 	try{ 
// 		$query ="select * from students 
// 				where cardID=?";
// 		$statement=$db->prepare($query);
// 		$statement->bindParam(1, $cardid);
// 		$statement->execute();
// 		$students=$statement->fetch();
// 		return $students;
// 	} catch(PDOException $e){
// 		$error_message=$e->getMessage();
// 		echo "database error:$error_message ";
// 		exit();
// 	}
// }
// function add_student($students){
// 	global $db;
// 	try {
// 		$query="INSERT INTO students(cardID,name,address,tel)
// 		VALUES(?,?,?,?)";
// 		$statement=$db->prepare($query);
// 		$statement->bindParam(1,$students['cardID']);
// 		$statement->bindParam(2,$students['name']);
// 		$statement->bindParam(3,$students['address']);
// 		$statement->bindParam(4,$students['tel']);

// 		$statement->execute();
// 		$statement->closeCursor();
// 	} catch (PDOException $e) {
// 		$error_message=$e->getMessage();
// 		echo "database error:$error_message ";
// 		exit();
// 	}

// }
// function deletebook($cardID){
// 	global $db;
// 	try {
// 		$query="DELETE FROM students WHERE cardID=?";
// 		$statement=$db->prepare($query);
// 		$statement->bindParam(1,$cardID);
// 		$statement->execute();
// 		$statement->closeCursor();
// 	} catch (PDOException $e) {
// 		$error_message=$e->getMessage();
// 		echo "database error:$error_message ";
// 		exit();
// 	}
// }

// function update_student($students){
// 	global $db;
// 	try {
// 		$query="UPDATE students SET name=?,address=?,tel=?
// 				WHERE cardID=?";
// 		$statement=$db->prepare($query);
// 		$statement->bindParam(1,$students['name']);
// 		$statement->bindParam(2,$students['address']);
// 		$statement->bindParam(3,$students['tel']);
// 		$statement->bindParam(4,$students['cardID']);
// 		$result = $statement->execute();
// 		return $result;
// 		$statement->closeCursor();
// 	} catch (PDOException $e) {
// 		$error_message=$e->getMessage();
// 		echo "database error:$error_message ";
// 		exit();
// 	}
// }
// function search_student($search_value){
// 	global $db;
// 	$search_value='%'.trim($search_value).'%';
// 	$query ="select * from students where name like? or address like? or tel like?";
// 	try {
// 		$statement =$db->prepare($query);
// 		$statement->bindParam(1,$search_value);
// 		$statement->bindParam(2,$search_value);
// 		$statement->bindParam(3,$search_value);
// 		$statement->execute();
// 		$result = $statement->fetchAll();

// 		$statement->closeCursor();
// 		return $result;
// 	} catch (PDOException $e) {
// 		$error_message=$e->getMessage();
// 		echo "database error: $error_message";
// 		exit();
// 	}
// }
// OPP
class StudentDB{
	public function get_students(){
		$db = Database::getDB();
		try{
			$query ="select * from students";
			$statement=$db->prepare($query);
			$statement->execute();
			$students=$statement->fetchAll();
			return $students;
		} catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function get_students_by_cardid($cardid){
		$db = Database::getDB();
		try{ 
			$query ="select * from students 
			where cardID=?";
			$statement=$db->prepare($query);
			$statement->bindParam(1, $cardid);
			$statement->execute();
			$students=$statement->fetch();
			return $students;
		} catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function add_student($students){
		$db = Database::getDB();
		try {
			$query="INSERT INTO students(cardID,name,address,tel)
			VALUES(?,?,?,?)";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$students['cardID']);
			$statement->bindParam(2,$students['name']);
			$statement->bindParam(3,$students['address']);
			$statement->bindParam(4,$students['tel']);

			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}

	}
	public function deletebook($cardID){
		$db = Database::getDB();
		try {
			$query="DELETE FROM students WHERE cardID=?";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$cardID);
			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public static function update_student($students){
		$db = Database::getDB();
		try {
			$query="UPDATE students SET name=?,address=?,tel=?
			WHERE cardID=?";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$students['name']);
			$statement->bindParam(2,$students['address']);
			$statement->bindParam(3,$students['tel']);
			$statement->bindParam(4,$students['cardID']);
			$result = $statement->execute();
			return $result;
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public static function search_student($search_value){
		$db = Database::getDB();
		$search_value='%'.trim($search_value).'%';
		$query ="select * from students where  name like? or address like? or tel like?";
		try {
			$statement =$db->prepare($query);
			$statement->bindParam(1,$search_value);
			$statement->bindParam(2,$search_value);
			$statement->bindParam(3,$search_value);
			$statement->execute();
			$result = $statement->fetchAll();
			
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error: $error_message";
			exit();
		}
	}
	public static function check_cardID($cardID){
		$db = Database::getDB();
		$query ="select * from students where cardID=?";
		try {
			$statement =$db->prepare($query);
			$statement->bindParam(1,$cardID);
			$statement->execute();
			$student = $statement->fetch();
			if(!empty($student)){
				return true;
			}else{
				return false;
			}
			$statement->closeCursor();
			return $student;
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error: $error_message";
			exit();
		}
	}

}


?>