<?php
include "../commons/connect_db.php";
class NavigatorDao {
	
	private $conn;

	public function __construct(){
		$conn = getDBConn();
	}
	public function __destruct(){
		$conn->close();
	}
	
}
?>