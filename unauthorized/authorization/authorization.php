<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/session.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/class.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/function.php');

	if(isset($_SESSION['connection'])){
		header('location:/');
	}
	$data = $_REQUEST;
	//была ли нажата кнопка авторизации 
	if(isset($data['do_authorization'])){
		//если кнопка нажата то проверяем поля ввода
		//создаем переменную для хранения ошибок авторизации
		$errors = [];
		$user_auto = new user_auto($data['login'],$data['password']);
		if(empty($data['login'])){
			$errors[] = 'Введите логин!';
		}
		if(!$user_auto->isLogin($data['login'])){
			$errors[] = 'Данного логина не существует!';
		}
		if(empty($data['password'])){
			$errors[] = 'Введите пароль!';
		}
		if(!$user_auto->isTruePassword($data['password'])){
			$errors[] = 'Не верно указан пароль';
		}
		//есть ошибки ? 
		if(empty($errors)){
			//ошибок нету 
			//создаем ссесию и в ней сохраняем логин пользователя
			$_SESSION['connection'] = trim($data['login']);
			header('location:/');
		}else{
			//ошибки есть 
			//выводи ошибку 
			require_once('logIn.html.php');
		}

	}else{
		//если кнопка не нажата выводим страцицу
		require_once('logIn.html.php');
	}