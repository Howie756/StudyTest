<?php
include '../entities/Navigator.php';
include '../commons/UploadImage.php';

$parentId = $_POST["parentId"];
$title = $_POST["title"];
$type = $parentId;
$snapshots = $_FILES["snapshots"];

$conn0 = getDBConn();
$selectNaviStr = "select id, parent_id, title, alias, url from navigator where parent_id = ".$parentId." and title='".$title."';";
$result0 = $conn0->query($selectNaviStr);
$navigator = new Navigator();
if($result0->num_rows > 0){
	while($row = $result0->fetch_assoc()){
		$navigator->setId($row["id"]);
		$navigator->setParentId($row["parent_id"]);
		$navigator->setTitle($row["title"]);
		$navigator->setAlias($row["alias"]);
		$navigator->setUrl($row["url"]);
	}
	$conn0->close();
}else {
	$conn0->close();
	$navigator->setId(insertNewNavi($parentId, $title));
}
dealImages($navigator->getId(), $type, $snapshots);
echo '{"numbers":"'.count($snapshots["name"]).'","msg":"Inserted successfully."}';

function insertNewNavi($param1, $param2){
	$conn1 = getDBConn();
	$paramURL = "javascript:void(0);";
	if($param1 == 2){
		$paramURL = "lonloncup.php";
	}else if($param1 == 1){
		$paramURL = "tournaments.php";
	}
	$insertNaviStr = "insert into navigator (parent_id, title, alias, url) values (?, ?, ?, ?);";
	$stmt1 = $conn1->prepare($insertNaviStr);
	$stmt1->bind_param("isss", $param1, $param2, $param2, $paramURL);
	$stmt1->execute();
	$newId = $stmt1->insert_id;
	$stmt1->close();
	$conn1->close();
	return $newId;
}

function dealImages($navigatorId, $type, $snapshots){
	$length = count($snapshots["name"]);
	for($i = 0; $i < $length; $i++){
		uploadFImage($snapshots["tmp_name"][$i], "../uploadImages".$type."/", $navigatorId, $type, "uploadImages".$type."/".$snapshots["name"][$i], $snapshots["name"][$i], null, null);
	}
}

?>