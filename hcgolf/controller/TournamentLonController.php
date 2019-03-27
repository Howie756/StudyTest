<?php
include '../entities/Navigator.php';
include '../commons/UploadImage.php';

$parentId = $_POST["parentId"];
$title = $_POST["title"];
$type = $_POST["type"];
$datePlaces = $_POST["datePlaces"];
$captains = $_POST["captains"];
$players = $_POST["players"];
$winners = $_POST["winners"];
$snapshots = $_FILES["snapshots"];

//var_dump($players);
//var_dump($snapshots);

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
insertTournamentLon($navigator->getId(), $datePlaces, $captains, $players, $winners, $snapshots, $type);
echo '{"numbers":"'.count($captains).'","msg":"Inserted successfully."}';

function insertNewNavi($param1, $param2){
	$conn1 = getDBConn();
	$paramURL = "lonloncup.php";
	$insertNaviStr = "insert into navigator (parent_id, title, alias, url) values (?, ?, ?, ?);";
	$stmt1 = $conn1->prepare($insertNaviStr);
	$stmt1->bind_param("isss", $param1, $param2, $param2, $paramURL);
	$stmt1->execute();
	$newId = $stmt1->insert_id;
	$stmt1->close();
	$conn1->close();
	return $newId;
}

function insertTournamentLon($navigatorId, $datePlaces, $captains, $players, $winners, $snapshots, $type){
	$datePlace = "";
	$captain = "";
	$player = "";
	$winner = "";
	$snapshot = 0;
	$insertSql = "insert into tournament_lon(navigator_id, date_place, captain, players, winners, snapshot, type) values(?, ?, ?, ?, ?, ?, ?);";
	$conn = getDBConn();
	$stmt = $conn->prepare($insertSql);
	$stmt->bind_param("issssii", $navigatorId, $datePlace, $captain, $player, $winner, $snapshot, $type);
	for($i = 0; $i < count($captains); $i++){
		$datePlace = $datePlaces[$i];
		$captain = $captains[$i];
		$player = $players[$i];
		$winner = $winners[$i];
		$snapshot = uploadFImage($snapshots["tmp_name"][$i], "../uploadImages/", 0, $type, "uploadImages/".$snapshots["name"][$i], $snapshots["name"][$i], null, null);
		$stmt->execute();
	}
	$stmt->close();
	$conn->close();
}

?>