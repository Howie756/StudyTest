<?php
	include 'connect_db.php';
	function showUlNavigator($param){
		
		$conn = getDBconn();
		if($conn->connect_error){
			die("connect_error:" . $conn->connect_error);
		}
		$sqlStr = 'select id, parent_id, title, alias, url, create_date, update_date, remark from navigator where parent_id = ?;';
		$stmt = $conn->prepare($sqlStr);
		$stmt->bind_param('i', $param);
		$stmt->execute();
		$stmt->bind_result($id, $parent_id, $title, $alias, $url, $create_date, $update_date, $remark);
		while($stmt->fetch()){
			if($parent_id == 3){
				echo "<li><a id='" . $id . "' href='" . $url . "' onclick='showContent(this)'>" . $title . "</a></li>";
			}else {
				echo "<li><a id='" . $id . "' href='" . $url . "' >" . $title . "</a></li>";
			}
		}
		$stmt->close();
		$conn->close();
	}
	
	function showParentTitle($paramId){
		$conn = getDBconn();
		if($conn->connect_error){
			die("connect_error:" . $conn->connect_error);
		}
		$sqlStr = "select id, title from navigator where id = ?;";
		$stmt = $conn->prepare($sqlStr);
		$stmt->bind_param("i", $paramId);
		$stmt->execute();
		$stmt->bind_result($id, $title);
		while($stmt->fetch()){
			echo $title;
		}
		$stmt->close();
		$conn->close();
	}
	
?>