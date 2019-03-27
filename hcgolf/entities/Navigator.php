<?php
class Navigator {
	private $id;
	private $parentId;
	private $itle;
	private $alias;
	private $url;
	private $sponsors;
	private $arranged;
	private $describe;
	private $createDate;
	private $updateDate;
	private $remark;
	
	public function __construct(){
	}
	/*
	public function __construct($id, $parent_id, $title, $alias, $url, $sponsors, $arranged, $describe, $create_date, $update_date, $remark){
		$this->id = $id;
		$this->parentId = $parent_id;
		$this->title = $title;
		$this->alias = $alias;
		$this->url = $url;
		$this->sponsors = $sponsors;
		$this->arranged = $arranged;
		$this->describe = $describe;
		$this->createDate = $create_date;
		$this->updateDate = $update_date;
		$this->remark = $remark;
	}
	*/
	public function setId($param){
		$this->id = $param;
	}
	public function getId(){
		return $this->id;
	}
	
	public function setParentId($param){
		$this->parentId = $param;
	}
	public function getParentId(){
		return $this->parentId;
	}
	public function setTitle($param){
		$this->title = $param;
	}
	public function getTitle(){
		return $this->title;
	}
	public function setAlias($param){
		$this->alias = $param;
	}
	public function getAlias(){
		return $this->alias;
	}
	
	public function setUrl($param){
		$this->url = $param;
	}
	public function getUrl(){
		return $this->url;
	}
	
	public function setSponsors($param){
		$this->sponsors = $param;
	}
	public function getSponsors(){
		return $this->sponsors;
	}
	public function setArranged($param){
		$this->arranged = $param;
	}
	public function getArranged(){
		return $this->arranged;
	}
	public function setDescribe($param){
		$this->describe = $param;
	}
	public function getDescribe(){
		return $this->describe;
	}
	
	public function setCreateDate($param){
		$this->createDate = $param;
	}
	public function getCreateDate(){
		return $this->createDate;
	}
	public function setUpdateDate($param){
		$this->updateDate = $param;
	}
	public function getUpdateDate(){
		return $this->updateDate;
	}
	public function setRemark($param){
		$this->remark = $param;
	}
	public function getRemark(){
		return $this->remark;
	}
	
	public function __toString(){
		return '{"id":"'.$this->id.'","parentId":"'.$this->parentId.'","title":"'.$this->title.'","alias":"'.$this->alias.'","url":"'.$this->url.'","sponsors":"'.$this->sponsors.'","arranged":"'.$this->arranged.'",'
		 .'"describe":"'.$this->describe.'","createDate":"'.$this->createDate.'","updateDate":"'.$this->updateDate.'","remark":"'.$this->remark.'"}';
	}
}
?>