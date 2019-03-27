<?php
include '../entities/Navigator.php';
include '../commons/UploadImage.php';

$parentId = $_POST["parentId"];
$title = $_POST["title"];
$type0 = $_POST["type"];
$rankings = $_POST["rankings"];
$names = $_POST["names"];
$snapshots = $_FILES["snapshots"];

//var_dump($snapshots);
//echo uploadFImage($snapshots["tmp_name"][0], "../uploadImages/", 0, 1, "/uploadImages/".$snapshots["name"][0], $snapshots["name"][0], null, null);

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
insertTournamentHCGA($navigator->getId(), $rankings, $names, $snapshots, $type0);
echo '{"numbers":"'.count($names).'","msg":"Inserted successfully."}';


function insertNewNavi($param1, $param2){
	$conn1 = getDBConn();
	$paramURL = "tournaments.php";
	$insertNaviStr = "insert into navigator (parent_id, title, alias, url) values (?, ?, ?, ?);";
	$stmt1 = $conn1->prepare($insertNaviStr);
	$stmt1->bind_param("isss", $param1, $param2, $param2, $paramURL);
	$stmt1->execute();
	$newId = $stmt1->insert_id;
	$stmt1->close();
	$conn1->close();
	return $newId;
}

function insertTournamentHCGA($paramNId, $paramRanks, $paramNames, $paramSnaps, $paramType){
	$conn = getDBConn();
	$curRank = "";
	$curName = "";
	$curSnapshot = 0;
	$insertSql = "insert into tournament_hcga (navigator_id, ranking, winner, snapshot, type) values(?, ?, ?, ?, ?);";
	$stmt = $conn->prepare($insertSql);
	$stmt->bind_param("issii", $paramNId, $curRank, $curName, $curSnapshot, $paramType);
	$length = count($paramNames);
	for($i = 0; $i < $length; $i++){
		$curRank = $paramRanks[$i];
		$curName = $paramNames[$i];
		$curSnapshot = uploadFImage($paramSnaps["tmp_name"][$i], "../uploadImages/", 0, $paramType, "uploadImages/".$paramSnaps["name"][$i], $paramSnaps["name"][$i], null, null);
		$stmt->execute();
	}
	$stmt->close();
	$conn->close();
}


?>