<?php
	include '../entities/TournamentLon.php';
	include '../commons/connect_db.php';
	
	$nId = $_POST["nId"];
	
	$conn = getDBConn();
	$sql = "select id, navigator_id, date_place, captain, players, winners, snapshot, type, remark from tournament_lon where navigator_id = ".$nId.";";
	$result = $conn->query($sql);
	$r_array = array();
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$lon = new TournamentLon();
			$lon->setId($row["id"]);
			$lon->setNavigatorId($row["navigator_id"]);
			$lon->setDatePlace($row["date_place"]);
			$lon->setCaptain($row["captain"]);
			$lon->setPlayers($row["players"]);
			$lon->setWinners($row["winners"]);
			$lon->setSnapshot(getImgUrlById($row["snapshot"]));
			$lon->setType0($row["type"]);
			$lon->setRemark($row["remark"]);
			array_push($r_array, json_decode($lon->__toString()));
		}
	}
	echo json_encode($r_array);
	
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