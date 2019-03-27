<?php 
	include '../entities/User.php';
	include '../commons/connect_db.php';
	session_start();
	$username = $_POST["username"];
	$password = $_POST["password"];

	if(isset($_SESSION["user"])){
		$user = $_SESSION["user"];
		//var_dump($user);
		//echo ($user->getUserName() == $username && $user->getPassword() == $password) ? "true" : "false";
		if($user->getUserName() == $username && $user->getPassword() == $password){
			
			echo $user->loginFlag();
		}else {
			login($username, $password);
		}
	}else {
		login($username, $password);
	}
	
	function login($param1, $param2){
		$conn = getDBConn();
		$sqlStr = "select id, username, password, session_id, last_login from user where username = ? and password = ?";
		$stmt = $conn->prepare($sqlStr);
		$stmt->bind_param("ss", $param1, $param2);
		$stmt->execute();
		$stmt->bind_result($id, $username, $password, $sessionId, $lastLogin);
		$user0 = new User();
		while($stmt->fetch()){
			//echo $id . " " . $username . " " . $password . " " . $sessionId . " " . $lastLogin . " " . PHP_EOL;
			$user0->setId($id);
			$user0->setUserName($username);
			$user0->setPassword($password);
			$user0->setSessionId(session_id());
			$user0->setLastLogin($lastLogin);
		}
		$_SESSION["user"] = $user0;
		setcookie("username", $user0->getUserName(), time() + 1800, "/hcgolf");
		setcookie("password", $user0->getPassword(), time() + 1800, "/hcgolf");
		$stmt->close();
		$conn->close();
		echo $user0->loginFlag();
	}
?>