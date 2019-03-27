<?php
include "../entities/Image.php";
include 'connect_db.php';

function insertImage($navigatorId, $type, $url, $name, $descripe, $remark){
	$conn2 = getDBConn();
	$insertSql = "insert into image(navigator_id, type, url, name, descripe, remark) values(?, ?, ?, ?, ?, ?);";
	$stmt2 = $conn2->prepare($insertSql);
	$stmt2->bind_param("iissss", $navigatorId, $type, $url, $name, $descripe, $remark);
	$stmt2->execute();
	$newId = $stmt2->insert_id;
	$stmt2->close();
	$conn2->close();
	return $newId;
}

function uploadFImage($source, $path, $navigatorId, $type, $url, $name, $descripe, $remark){
	if(!is_dir($path)){
		mkdir($path);
	}
	copy($source, $path."/".$name);
	return insertImage($navigatorId, $type, $url, $name, $descripe, $remark);
}

?>