<?php 
class AdminDB{
	public static function check_login($user){
		$db=Database::getDB();
		try{
			$query="select*from Admin where username=? and password=?";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$user['username']);
			$statement->bindParam(2,$user['password']);
			$statement->execute();
			$result=$statement->fetchAll();
			$statement->closeCursor();
			if(count($result)>0){
				return true;
			}else{
				return false;
			}
			
		} catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public static function get_lavel_by_user($username){
		$db= Database::getDB();
		try{ 
			$query ="select * from Admin 
			where username=?";
			$statement=$db->prepare($query);
			$statement->bindParam(1, $username);
			$statement->execute();
			$books=$statement->fetch();
			return $books;
		} catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}


	public function get_user_by_id($ID){
		$db= Database::getDB();
		try{ 
			$query ="select * from Admin
			where id=?";
			$statement=$db->prepare($query);
			$statement->bindParam(1, $ID);
			$statement->execute();
			$category=$statement->fetch();
			return($category);
		} catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}


	public function get_users(){
		$db= Database::getDB();
		try{
			$query ="select * from Admin";
			$statement=$db->prepare($query);
			$statement->execute();
			$users=$statement->fetchAll();
			return($users);
		} catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function add_user($user){
		$db = Database::getDB();
		try {
			$query = "insert into Admin(id,username,password,name,lavel)
			VALUES(?,?,?,?,?)";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$user['id']);
			$statement->bindParam(2,$user['username']);
			$statement->bindParam(3,$user['password']);
			$statement->bindParam(4,$user['name']);
			$statement->bindParam(5,$user['lavel']);
			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}

	}
	public function update_user($user){
		$db = Database::getDB();

		$query='update Admin set username=?,password=?,name=?,lavel=?
		WHERE id=?';
		try {
			$statement=$db->prepare($query);
			$statement->bindParam(1,$user['username']);
			$statement->bindParam(2,$user['password']);
			$statement->bindParam(3,$user['name']);
			$statement->bindParam(4,$user['lavel']);
			$statement->bindParam(5,$user['id']);

			$result = $statement->execute();
			return $result;
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function delete_user($ID){
		$db = Database::getDB();
		try {
			$query="delete from Admin where id=?";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$ID);
			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}


}


?>