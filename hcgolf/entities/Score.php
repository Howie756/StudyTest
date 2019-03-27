<?php
	class Score {
		private $id;
		private $navigator;
		private $name;
		private $strokes;
		private $hcp;
		private $ranking;
		private $remark;
		
		/**
		function __construct(){}
		
		function __construct($param1, $param2, $param3, $param4, $param5, $parma6, $param7){
			$this->id = $param1;
			$this->navigator = $param2;
			$this->name = $param3;
			$this->strokes = $param4;
			$this->hcp = $param5;
			$this->ranking = $parma6;
			$this->remark = $param7;
		}
		*/
		function setId($param){
			$this->id = $param;
		}
		function getId(){
			return $this->id;
		}
		
		function setNavigator($param){
			$this->navigator = $param;
		}
		
		function getNavigator(){
			return $this->navigator;
		}
		
		function setName($param){
			$this->name = $param;
		}
		function getName(){
			return $this->name;
		}
		
		function setStrokes($param){
			$this->strokes = $param;
		}
		function getStrokes(){
			return $this->strokes;
		}
		
		function setHcp($param){
			$this->hcp = $param;
		}
		function getHcp(){
			return $this->hcp;
		}
		function setRanking($param){
			$this->ranking = $param;
		}
		function getRanking(){
			return $this->ranking;
		}
		function setRemark($param){
			$this->remark = $param;
		}
		function getRemark(){
			return $this->remark;
		}
		public function __toString(){
			//return '{"id":"'. $this->getId() .'"}';
			return '{"id":"'.$this->id.'","navigator":"'.$this->navigator.'","name":"'.$this->name.'","strokes":"'.$this->strokes.'","hcp":"'.$this->hcp.'","ranking":"'.$this->ranking.'"}';
		}
	}
?>