<?php
	include '../entities/TournamentHCGA.php';
	include '../commons/connect_db.php';
	
	$nId = $_POST["nId"];
	
	$conn = getDBConn();
	$selectSql = "select id, navigator_id, ranking, winner, snapshot, type, remark from tournament_hcga where navigator_id = ?";
	$stmt = $conn->prepare($selectSql);
	$stmt->bind_param("i", $nId);
	$stmt->execute();
	$stmt->bind_result($id, $navigatorId, $ranking, $winner, $snapshot, $type, $remark);
	$result = array();
	while($stmt->fetch()){
		$hcga = new TournamentHCGA();
		$hcga->setId($id);
		$hcga->setNavigatorId($navigatorId);
		$hcga->setRanking($ranking);
		$hcga->setWinner($winner);
		$hcga->setSnapshot(getImgUrlById($snapshot));
		$hcga->setType0($type);
		$hcga->setRemark($remark);
		array_push($result, json_decode($hcga->__toString()));
	}
	$stmt->close();
	$conn->close();
	
	//var_dump($result);
	echo json_encode($result);
	
	function getImgUrlById($id){
		$conn = getDBConn();
		$sql = "select url from image where id = ".$id.";";
		$result = $conn->query($sql);
		$url = "";
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$url = $row["url"];
			}
		}
		return $url;
	}
?>