<?php
class Image {
	private $id;
	private $navigatorId;
	private $type0;
	private $url;
	private $name;
	private $descripe;
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
	
	public function setType0($param){
		$this->type0 = $param;
	}
	public function getType0(){
		return $this->type0;
	}
	
	public function setUrl($param){
		$this->url = $param;
	}
	public function getUrl(){
		return $this->url;
	}
	
	public function setName($param){
		$this->name = $param;
	}
	public function getName(){
		return $this->name;
	}
	
	public function setDescripe($param){
		$this->descripe = $param;
	}
	public function getDescripe(){
		return $this->descripe;
	}
	
	public function setRemark($param){
		$this->remark = $param;
	}
	public function getRemark(){
		return $this->remark;
	}
	
	public function __toString(){
		return '{"id":"'.$this->id.'","navigatorId":"'.$this->navigatorId.'","type0":"'.$this->type0.'","url":"'.$this->url.'","name":"'.$this->name.'","descripe":"'.$this->descripe.'","remark":"'.$this->remark.'"}';
	}
}

?>