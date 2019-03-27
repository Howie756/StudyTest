<?php
	include '../entities/Image.php';
	include '../commons/connect_db.php';
	
	$nId = $_POST["nId"];
	
	$conn = getDBConn();
	$sql = "select id, navigator_id, type, url, name, descripe, remark from image where navigator_id = ".$nId.";";
	$result = $conn->query($sql);
	$r_array = array();
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$img = new Image();
			$img->setId($row["id"]);
			$img->setNavigatorId($row["navigator_id"]);
			$img->setType0($row["type"]);
			$img->setUrl($row["url"]);
			$img->setName($row["name"]);
			$img->setDescripe($row["descripe"]);
			$img->setRemark($row["remark"]);
			array_push($r_array, json_decode($img->__toString()));
		}
	}
	echo json_encode($r_array);
?>