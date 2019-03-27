<?php 
include '../commons/connect_db.php';
include '../entities/Navigator.php';
$parentId = $_POST["parentId"];
$title = $_POST["title"];
$names = $_POST["name"];
$strokes = $_POST["strokes"];
$hcps = $_POST["hcp"];

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
insertScores($navigator->getId(), $names, $strokes, $hcps);
echo '{"numbers":"'.count($names).'","msg":"Inserted successfully."}';


function insertNewNavi($param1, $param2){
	$conn1 = getDBConn();
	$paramURL = "javascript:void(0);";
	$insertNaviStr = "insert into navigator (parent_id, title, alias, url) values (?, ?, ?, ?);";
	$stmt1 = $conn1->prepare($insertNaviStr);
	$stmt1->bind_param("isss", $param1, $param2, $param2, $paramURL);
	$stmt1->execute();
	$newId = $stmt1->insert_id;
	$stmt1->close();
	$conn1->close();
	return $newId;
}

function insertScores($navigatorId, $names, $strokes, $hcps){
	$name = "";
	$stroke = 0;
	$hcp = 0.0;
	$conn = getDBConn();
	$insertScoreSql = "insert into score_content(navigator_id, name, strokes, hcp) values(?, ?, ?, ?);";
	$stmt = $conn->prepare($insertScoreSql);
	$stmt->bind_param("isid", $navigatorId, $name, $stroke, $hcp);
	$length = count($names);
	for($i = 0; $i < $length; $i++){
		$name = $names[$i];
		$stroke = $strokes[$i];
		$hcp = $hcps[$i];
		$stmt->execute();
	}
	$stmt->close();
	$conn->close();
}




?>