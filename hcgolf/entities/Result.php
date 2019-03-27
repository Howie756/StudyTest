<?php
class Result{
	private $num;
	private $msg;
	private $err;
	
	function __construct($num, $msg, $err){
		$this->num = $num;
		$this->msg = $msg;
		$this->err = $err;
	}
	
	function setNum($num){
		$this->num = $num;
	}
	function getNum(){
		return $this->num;
	}
	function setMsg($msg){
		$this->msg = $msg;
	}
	function getMsg(){
		return $this->msg;
	}
	function setErr($err){
		$this->err = $err;
	}
	function getErr(){
		return $this->err;
	}
	
	function __toString(){
		return '{"num":"'.$this->num.'","msg":"'.$this->msg.'","err":"'.$this->err.'"}';
	}
}
?>