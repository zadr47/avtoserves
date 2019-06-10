<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/session.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/class.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/function.php');
	is_table_user();
	$zd = 5;
	//проверка существует ли ссесия у пользователя
	if(isset($_SESSION['connection'])){
		//если существует - переходим на главную страницу 
		require_once($_SERVER['DOCUMENT_ROOT'].path_to_authorized_page);
	}else{
		//если не существует - просим зарегистрироваться или авторизироваться
		require_once($_SERVER['DOCUMENT_ROOT'].path_to_unauthorized_page);
		// на подключенной странице форма для авторизации и ссылка на регистрацию
	}
