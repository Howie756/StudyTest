<?php
class TournamentLon {
	private $id;
	private $navigatorId;
	private $datePlace;
	private $captain;
	private $players;
	private $winners;
	private $snapshot;
	private $type0;
	//private $pictures;
	//private $backup;
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
	
	public function setDatePlace($param){
		$this->datePlace = $param;
	}
	public function getDatePlace(){
		return $this->datePlace;
	}
	
	public function setCaptain($param){
		$this->captain = $param;
	}
	public function getCaptain(){
		return $this->captain;
	}
	
	public function setPlayers($param){
		$this->players = $param;
	}
	public function getPlayers(){
		return $this->players;
	}
	
	public function setWinners($param){
		$this->winners = $param;
	}
	public function getWinner(){
		return $this->winners;
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
		return '{"id":"'.$this->id.'","navigatorId":"'.$this->navigatorId.'","datePlace":"'.$this->datePlace.'","captain":"'.$this->captain.'","players":"'.$this->players.'","winners":"'.$this->winners.'","snapshot":"'.$this->snapshot.'","type0":"'.$this->type0.'","remark":"'.$this->remark.'"}';
	}
}
?>