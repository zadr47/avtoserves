<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/session.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/class.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/function.php');
	
	if(!isset($_SESSION['connection'])){
		header('location:/');
	}

	$data = $_REQUEST;
	if(isset($data['do_restore_password'])){
		$errors = [];
		if(!empty($data['login'])){
			$errors[] = 'Укажите ваш логин!';
		}
		if(empty($errors)){
			
		}else{
			echo $errors[0];
			require_once($_SERVER['DOCUMENT_ROOT'].path_to_restore_password_page);
		}

	}else{		
		require_once($_SERVER['DOCUMENT_ROOT'].path_to_restore_password_page);
	}