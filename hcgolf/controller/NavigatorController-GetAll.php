<?php
	include "../dao/NavigatorDao.php";
	
	$naviDao = new NavigatorDao();
	
	echo $naviDao->searchAll();
?>