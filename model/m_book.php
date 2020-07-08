<?php 

// OPP
class BookDB{
	public function get_books(){
		$db= Database::getDB();
		try{
			$query ="select * from books";
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
	public function get_book_by_categoryid($categoryID){
		$db= Database::getDB();
		try{ 
			$query ="select * from books 
			where categoryID=:id";
			$statement=$db->prepare($query);
			$statement->bindValue(':id', $categoryID);
			$statement->execute();
			$books=$statement->fetchAll();
			return($books);
		} catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function get_book_by_bookid($bookid){
		$db= Database::getDB();
		try{ 
			$query ="select * from books 
			where bookID=?";
			$statement=$db->prepare($query);
			$statement->bindParam(1, $bookid);
			$statement->execute();
			$books=$statement->fetch();
			return $books;
		} catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function addbook($book){
		$db = Database::getDB();
		try {
			$query = "insert into books(bookID,name,publisher,author,categoryID,numOfPage,maxdate,num,summary,picture)
			VALUES(?,?,?,?,?,?,?,?,?,?)";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$book['bookID']);
			$statement->bindParam(2,$book['name']);
			$statement->bindParam(3,$book['publisher']);
			$statement->bindParam(4,$book['author']);
			$statement->bindParam(5,$book['categoryID']);
			$statement->bindParam(6,$book['numOfPage']);
			$statement->bindParam(7,$book['maxdate']);
			$statement->bindParam(8,$book['num']);
			$statement->bindParam(9,$book['summary']);
			$statement->bindParam(10,$book['picture']);
			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}

	}
	public function deletebook($bookID){
		$db = Database::getDB();
		try {
			$query="delete from books where bookID=?";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$bookID);
			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function update_book($book){
		$db = Database::getDB();

		$query='update books set name=?,publisher=?,author=?,categoryID=?,numOfPage=?,maxdate=?,num=?,summary=?,picture=?
		WHERE bookID=?';
		try {
			$statement=$db->prepare($query);
			$statement->bindParam(1,$book['name']);
			$statement->bindParam(2,$book['publisher']);
			$statement->bindParam(3,$book['author']);
			$statement->bindParam(4,$book['categoryID']);
			$statement->bindParam(5,$book['numOfPage']);
			$statement->bindParam(6,$book['maxdate']);
			$statement->bindParam(7,$book['num']);
			$statement->bindParam(8,$book['summary']);
			$statement->bindParam(9,$book['picture']);
			$statement->bindParam(10,$book['bookID']);
			$result = $statement->execute();
			return $result;
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function search_book($search_value){
		$db = Database::getDB();
		$search_value='%'.trim($search_value).'%';
		try {
			$query ="select *FROM books WHERE name like? OR summary like? OR author like? or publisher like?";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$search_value);
			$statement->bindParam(2,$search_value);
			$statement->bindParam(3,$search_value);
			$statement->bindParam(4,$search_value);
			$statement->execute();
			$result = $statement->fetchAll();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error:$error_message ";
			exit();
		}
	}
	public function check_bookID($bookID){
		$db = Database::getDB();
		$query ="select * from books where bookID=?";
		try {
			$statement =$db->prepare($query);
			$statement->bindParam(1,$bookID);
			$statement->execute();
			$book = $statement->fetch();
			if(!empty($book)){
				return true;
			}else{
				return false;
			}
			$statement->closeCursor();
			return $book;
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error: $error_message";
			exit();
		}
	}

	




}


?>