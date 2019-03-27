<?php
include "../commons/connect_db.php";
include "../entities/Navigator.php";
include "../entities/Result.php";

class NavigatorDao {
	
	private $COMMON_STR = " id, parent_id, title, alias, url, sponsors, arranged, describe_, create_date, update_date, remark ";
	private $conn;

	public function __construct(){
		$this->conn = getDBConn();
	}
	public function __destruct(){
		$this->conn->close();
	}
	
	public function searchById($id){
		$sql = "select ".$this->COMMON_STR." from navigator where id = ?;";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt->bind_result($id, $parent_id, $title, $alias, $url, $sponsors, $arranged, $describe, $create_date, $update_date, $remark);
		$navigator = new Navigator();
		$navi->setId($id);
		$navi->setParentId($parent_id);
		$navi->setTitle($title);
		$navi->setAlias($alias);
		$navi->setUrl($url);
		$navi->setSponsors($sponsors);
		$navi->setArranged($arranged);
		$navi->setDescribe($describe);
		$navi->setCreateDate($create_date);
		$navi->setUpdateDate($update_date);
		$navi->setRemark($remark);
		$stmt->close();
		return $navigator->__toString();
	}
	
	public function searchAll(){
		$sql = "select ".$this->COMMON_STR." from navigator;";
		//echo ($this->conn == null) ? "TRUE" : "FAlse";
		//echo $sql;
		$result = $this->conn->query($sql);
		$results = array();
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$navi = new Navigator();
				$navi->setId($row["id"]);
				$navi->setParentId($row["parent_id"]);
				$navi->setTitle($row["title"]);
				$navi->setAlias($row["alias"]);
				$navi->setUrl($row["url"]);
				$navi->setSponsors($row["sponsors"]);
				$navi->setArranged($row["arranged"]);
				$navi->setDescribe($row["describe_"]);
				$navi->setCreateDate($row["create_date"]);
				$navi->setUpdateDate($row["update_date"]);
				$navi->setRemark($row["remark"]);
				array_push($results, json_decode($navi->__toString()));
			}
		}
		return json_encode($results);
	}
	
	public function insert($navigators){
		$sql = "insert into navigator(".$COMMON_STR.") values(?,?,?,?,?,?,?,?,?,?,?);";
		$stmt = $conn->prepare($sql);
		$navi = new Navigator();
		$stmt->bind_param("iisssssssss", $navi->getId(), $navi->getParentId(), $navi->getTitle(), $navi->getAlias(), $navi->getUrl(), $navi->getSponsors(), $navi->getArranged(), $navi->getDescribe(), 
			$navi->getCreateDate(), $navi->getUpdateDate(), $navi->getRemark());
		$length = count($navigators);
		for($i = 0; $i < $length; $i++){
			$navi = $navigators[$i];
			$stmt->execute();
		}
		$r = new Result($length, "datas inserted successfully.", "");
		return $r->__toString();
	}
	
	public function updateById($navi){
		$dyncSql = $this->getDyncSql($navi);
		$sql = "update navigator set ". $dyncSql. "where id = ". $navi->getId() .";";
		echo $sql;
		$r = null;
		if($this->conn->query($sql) == TRUE){
			$r = new Result(1, "datas updated successfully.", "");
		}else {
			$r = new Result(1, "", "datas updated failed.");
		}
		return $r->__toString();
	}
	
	// get the dynamic sql_string 
	private function getDyncSql($navi){
		$dyncSql = "";
		if($navi->getParentId() != null && $navi->getParentId() != ""){
			$dyncSql = $dyncSql ." parent_id = ". $navi->getParentId() .",";
		}
		if($navi->getTitle() != null && $navi->getTitle() != ""){
			$dyncSql = $dyncSql ." title = ". $navi->getTitle() .",";
		}
		if($navi->getAlias() != null && $navi->getAlias() != ""){
			$dyncSql = $dyncSql ." alias = ". $navi->getAlias() .",";
		}
		if($navi->getUrl() != null && $navi->getUrl() != ""){
			$dyncSql = $dyncSql ." url = ". $navi->getUrl() .",";
		}
		if($navi->getSponsors() != null && $navi->getSponsors() != ""){
			$dyncSql = $dyncSql ." sponsors = ". $navi->getSponsors() .",";
		}
		if($navi->getArranged() != null && $navi->getArranged() != ""){
			$dyncSql = $dyncSql ." arranged = ". $navi->getArranged() .",";
		}
		if($navi->getDescribe() != null && $navi->getDescribe() != ""){
			$dyncSql = $dyncSql ." describe = ". $navi->getDescribe() .",";
		}
		if($navi->getCreateDate() != null && $navi->getCreateDate() != ""){
			$dyncSql = $dyncSql ." create_date = ". $navi->getCreateDate() .",";
		}
		if($navi->getUpdateDate() != null && $navi->getUpdateDate() != ""){
			$dyncSql = $dyncSql ." update_date = ". $navi->getUpdateDate() .",";
		}
		if($navi->getRemark() != null && $navi->getRemark() != ""){
			$dyncSql = $dyncSql ." remark = ". $navi->getRemark() .",";
		}
		return substr($dyncSql, 0, -1);
	}
	
}
?>