<?php 
class User {
	private $id;
	private $username;
	private $password;
	private $sessionId;
	private $lastLogin;
	
	public function setId($param){
		$this->id = $param;
	}
	public function getId(){
		return $this->id;
	}
	
	public function setUserName($param){
		$this->username = $param;
	}
	public function getUserName(){
		return $this->username;
	}
	
	public function setPassword($param){
		$this->password = $param;
	}
	public function getPassword(){
		return $this->password;
	}
	
	public function setSessionId($param){
		$this->sessionId = $param;
	}
	public function getSessionId(){
		return $this->sessionId;
	}
	
	public function setLastLogin($param){
		$this->lastLogin = $param;
	}
	public function getLastLogin(){
		return $this->lastLogin;
	}
	
	public function loginFlag(){
		return '{"id":"'.$this->id.'","sessionId":"'.$this->sessionId.'"}';
	}
	
	public function __toString(){
		return '{"id":"'.$this->id.'","username":"'.$this->username.'","password":"'.$this->password.'","sessionId":"'.$this->sessionId.'","lastLogin":"'.$this->lastLogin.'"}';
	}
}
?>