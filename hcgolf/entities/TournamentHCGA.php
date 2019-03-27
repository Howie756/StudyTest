<?php
	class TournamentHCGA {
		private $id;
		private $navigatorId;
		private $ranking;
		private $winner;
		private $snapshot;
		private $type0;
		//private backup;
		private $remark;
		
		public function setId($param){
			$this->id = $param;
		}
		public function getId(){
			return $this->id;
		}
		
		public function setNavigatorId($param){
			$this->navigatorId = $param;
		}
		public function getNavigatorId(){
			return $this->navigatorId;
		}
		
		public function setRanking($param){
			$this->ranking = $param;
		}
		public function getRanking(){
			return $this->ranking;
		}
		
		public function setWinner($param){
			$this->winner = $param;
		}
		public function getWinner(){
			return $this->winner;
		}
		
		public function setSnapshot($param){
			$this->snapshot = $param;
		}
		public function getSnapshot(){
			return $this->snapshot;
		}
		
		public function setType0($param){
			$this->type0 = $param;
		}
		public function getType0(){
			return $this->type0;
		}
		
		public function setRemark($param){
			$this->remark = $param;
		}
		public function getRemark(){
			return $this->remark;
		}
		
		public function __toString(){
			return '{"id":"'.$this->id.'","navigatorId":"'.$this->navigatorId.'","ranking":"'.$this->ranking.'","winner":"'.$this->winner.'","snapshot":"'.$this->snapshot.'","type0":"'.$this->type0.'","remark":"'.$this->remark.'"}';
		}
	}
?>