<?php
	include '../entities/Score.php';
	include '../commons/connect_db.php';
	$id = $_POST["id"];
	/*
	$serverName = '192.168.0.106';
	$userName = 'root';
	$password = '123456';
	$dbName = 'hcgolf';
	$conn = new Mysqli($serverName, $userName, $password, $dbName);
	*/
	$conn = getDBConn();
	if($conn->connect_error){
		die("connect_error:" . $conn->connect_error);
	}
	$sqlStr = 'select id, navigator_id, ranking, name, strokes, hcp, remark from score_content where navigator_id = ? order by strokes desc;';
	$stmt = $conn->prepare($sqlStr);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->bind_result($id, $navigator_id, $ranking, $name, $strokes, $hcp, $remark);
	$result = array();
	while($stmt->fetch()){
		//echo $id . " " . $navigator_id . " " . $ranking . " " . $name . " " . $strokes . " " . $hcp . " " . $remark . " " . PHP_EOL;
		$score = new Score();
		$score->setId($id);
		$score->setNavigator($navigator_id);
		$score->setRanking($ranking);
		$score->setName($name);
		$score->setStrokes($strokes);
		$score->setHcp($hcp);
		
		array_push($result, json_decode($score->__toString()));
	}
	$stmt->close();
	$conn->close();
	//var_dump($result);
	echo json_encode($result);
?>