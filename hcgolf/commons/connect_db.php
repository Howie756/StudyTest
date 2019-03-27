<?php
	function getDBConn(){
		
		// test environment
		// /*
		$serverName = '192.168.0.107';
		$userName = 'root';
		$password = '123456';
		$dbName = 'hcgolf';
		// */
		// production environment
		/*
		$serverName = 'db769919005.hosting-data.io';
		$userName = 'dbo769919005';
		$password = '12345678';
		$dbName = 'db769919005';
		*/
		$conn = new Mysqli($serverName, $userName, $password, $dbName);
		if($conn->connect_error){
			die("connect_error:" . $conn->connect_error);
		}
		return $conn;
	}
	
?>