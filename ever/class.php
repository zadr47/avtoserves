<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/function.php');

class user_reg{
	private 	$id;
	private 	$login;
	private 	$password;
	private 	$reg_data;
	private 	$email;

	public function __construct($login, $password, $email){
		
		require_once($_SERVER['DOCUMENT_ROOT'].'/ever/conn.php');

		$sql = 'SELECT max(id) FROM user;';

		$conn = new mysqli(HOST,USER,PASSWORD,BD);
		if($conn->connect_error){
			die("<b>подключение не удалось:</b>".$conn->connect_error);
		}
		$result_query = $conn->query($sql);
		$conn->close();
		$result_fetch_array = $result_query->fetch_array();
		//$id = $result_fetch_array['max(id)']+1;
		$this->id = $result_fetch_array['max(id)']+1;
		$this->login = trim($login);
		$this->password = md5($password);
		$this->reg_data = time();
		$this->email = $email;
	}
	public function isUser($login){
		require_once($_SERVER['DOCUMENT_ROOT'].'/ever/conn.php');
		$sql = "SELECT * FROM user WHERE login ='".$login."'";
		$conn = new mysqli(HOST,USER,PASSWORD,BD);
		if($conn->connect_error){
			die("<b>подключение не удалось:</b>".$conn->connect_error);
		}
		$result_query = $conn->query($sql);
		$conn->close();
		$result_num_rows = $result_query->num_rows;
		if($result_num_rows>0){
			return true;
		}else{
			return false;
		}
	}
	public function __destruct(){
		//echo "был вызван диструктор";
		require_once($_SERVER['DOCUMENT_ROOT'].'/ever/conn.php');

		$sql = "INSERT INTO user (id, login, password, reg_data, email) VALUES (
		".$this->id.",
		'".$this->login."',
		'".$this->password."',
		".$this->reg_data.",
		'".$this->email."');";

		$conn = new mysqli(HOST,USER,PASSWORD,BD);
		if($conn->connect_error){
			die("<b>подключение не удалось:</b>".$conn->connect_error);
		}
		$conn->query($sql);
		$conn->close();
	}
}




class user_auto{
	private $login;
	private $password;

	public function __construct($login,$password){
		$this->login = $login;
		$this->password = $password;
	}

	public function isLogin(){
		require_once($_SERVER['DOCUMENT_ROOT'].'/ever/conn.php');
		$sql = "SELECT * FROM user WHERE login ='".$this->login."'";
		$conn = new mysqli(HOST,USER,PASSWORD,BD);
		if($conn->connect_error){
			die("<b>подключение не удалось:</b>".$conn->connect_error);
		}
		$result_query = $conn->query($sql);
		$conn->close();
		$result_num_rows = $result_query->num_rows;
		if($result_num_rows>0){
			return true;
		}else{
			return false;
		}
	}

	public function isTruePassword($password){
		require_once($_SERVER['DOCUMENT_ROOT'].'/ever/conn.php');
		$sql = "SELECT password FROM user WHERE login ='".$this->login."'";
		$conn = new mysqli(HOST,USER,PASSWORD,BD);
		if($conn->connect_error){
			die("<b>подключение не удалось:</b>".$conn->connect_error);
		}
		$result_query = $conn->query($sql);
		$conn->close();
		$result_fetch_array = $result_query->fetch_array();
		if($result_fetch_array['password']==md5($password)){
			return true;
		}else{
			return false;
		}
	}
}


class user_restore_password{
	private $id;
	private $login;
	private $messeg;
	private $new_password;
	public function __construct($login){
		$this->login = $login;
		$this->messeg = mb_strimwidth(md5(time()),0,5);
		$this->id = get_id_by_login($login);
	}

	public function get_id_by_login($login){
		require_once($_SERVER['DOCUMENT_ROOT'].'/ever/conn.php');

		$sql = 'SELECT * FROM user WHERE login = '.$login;

		$conn = new mysqli(HOST,USER,PASSWORD,BD);
		if($conn->connect_error){
			die("<b>подключение не удалось:</b>".$conn->connect_error);
		}
		$result_query = $conn->query($sql);
		$conn->close();
		$result_fetch_assoc = $result_query->fetch_assoc();
		return $result_fetch_assoc['id'];
	}
	public function is_user($login){
		require_once($_SERVER['DOCUMENT_ROOT'].'/ever/conn.php');

		$sql = 'SELECT * FROM user WHERE login = '.$login;

		$conn = new mysqli(HOST,USER,PASSWORD,BD);
		if($conn->connect_error){
			die("<b>подключение не удалось:</b>".$conn->connect_error);
		}
		$result_query = $conn->query($sql);
		$conn->close();
		if($result_query->num_rows > 0){
			return true;
		}else{
			return flase;
		}
	}
	public function send_messeg(){
		
	}

}



class user_get{
	private		$id;
	private 	$login;
	private 	$password;
	private 	$avatar;
	private 	$linck;
	private 	$reg_data;

	public function __construct($id){

		require_once($_SERVER['DOCUMENT_ROOT'].'/ever/conn.php');

		$sql = 'SELECT * FROM user WHERE id = '.$id;

		$conn = new mysqli(HOST,USER,PASSWORD,BD);
		if($conn->connect_error){
			die("<b>подключение не удалось:</b>".$conn->connect_error);
		}
		$result_query = $conn->query($sql);
		$conn->close();
		$result_fetch_array = $result_query->fetch_array();
		$this->id = $result_fetch_array['id'];
		$this->login = $result_fetch_array['login'];
		$this->password = $result_fetch_array['password'];
		$this->avatar = $result_fetch_array['avatar'];
		$this->reg_data = $result_fetch_array['reg_data'];
		$this->linck = $result_fetch_array['linck'];
	}
	public function add_avatar($avatar){
		if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/img')){
			mkdir($_SERVER['DOCUMENT_ROOT'].'/img');
		}
		if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/img/user'.$this->id)){
			mkdir($_SERVER['DOCUMENT_ROOT'].'/img/user'.$this->id);
		}
		$this->avatar = '/img/user'.$this->id.'/img'.$this->id.'.jpg';
		move_uploaded_file($avatar['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/'.$this->avatar);
		$sql = "UPDATE user SET avatar = '".$this->avatar."' WHERE id = ".$this->id;
		require_once($_SERVER['DOCUMENT_ROOT'].'/ever/conn.php');
		$conn = new mysqli(HOST,USER,PASSWORD,BD);
		if($conn->connewct_error){
			die("<b>подключение не удалось:</b>".$conn->connect_error);
		}
		$conn->query($sql);
		$conn->close();
	}
	public function get_avatar(){
		return $this->avatar;
	}
	public function __toString(){
		return '<b>'.$this->login.'</b> - '.$this->id;
	}
	public function get_linck(){
		return $this->linck;
	}
	public function get_login(){
		return $this->login;
	}
	public function get_id_by_login($login){
		require_once($_SERVER['DOCUMENT_ROOT'].'/ever/conn.php');
		$sql = "SELECT id FROM user WHERE login ='".$login."'";
		$conn = new mysqli(HOST,USER,PASSWORD,BD);
		if($conn->connect_error){
			die("<b>подключение не удалось:</b>".$conn->connect_error);
		}
		$result_query = $conn->query($sql);
		$conn->close();
		$result_fetch_array = $result_query->fetch_array();
		return $result_fetch_array['id'];
	}
}


