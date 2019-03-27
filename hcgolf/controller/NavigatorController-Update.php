<?php
	include "../dao/NavigatorDao.php";
	
	$navi = new Navigator();
	$navi->setId($_POST["id"]);
	$navi->setParentId($_POST["parentId"]);
	$navi->setTitle($_POST["title"]);
	$navi->setAlias($_POST["alias"]);
	$navi->setUrl($_POST["url"]);
	$navi->setSponsors($_POST["sponsors"]);
	$navi->setArranged($_POST["arranged"]);
	$navi->setDescribe($_POST["describe_"]);
	$navi->setCreateDate($_POST["createDate"]);
	$navi->setUpdateDate($_POST["updateDate"]);
	$navi->setRemark($_POST["remark"]);
	
	$naviDao = new NavigatorDao();
	$naviDao->updateById($navi);

?>