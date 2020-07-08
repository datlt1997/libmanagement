<?php 
class ReceiptDB{

	public static function receipt_book($receipt){
		$db=Database::getDB();
		try {
			$query="insert into receipts(cardID, bookID, dateBorrow) values(?,?,?)";
			$statement=$db->prepare($query);
			$statement->bindParam(1,$receipt['cardID']);
			$statement->bindParam(2,$receipt['bookID']);
			$statement->bindParam(3,$receipt['dateBorrow']);
			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "database error: $error_message ";
			exit();
		}
	}
}



?>