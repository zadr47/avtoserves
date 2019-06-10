<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/session.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/class.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/function.php');

	if(isset($_SESSION['connection'])){
		header('location:/');
	}

	$data = $_REQUEST;	
	//была ли нажата кнопка регистрации
	if(isset($data['do_checkin'])){
		//проверям форму
		$errors =[];
		if(empty($data['login'])){
			$errors[] = 'Введите логин!';
		}
		if(!(strlen(trim($data['login']))>4 && strlen(trim($data['login']))<17)){
			$errors[] = 'Лониг должен содержать от 5 до 16 символов!';
		}if(!preg_match("{[a-z_A-Z0-9]+}xs",trim($data['login']))){
			$errors[] = 'Логин может содежать символы<br /> латинского алфавита';
		}
		if(!preg_match("{[^`~!@#$%&*()-=+\"№;%:*\\\/\|\/,/\"]+}xs",trim($data['login']))){
			$errors[] = 'Логин может содежать символы<br /> латинского алфавита';
		}
		if(user_reg::isUser(trim($data['login']))){
			$errors[] = 'Данный логин уже существует';
		}
		if(empty($data['email'])){
			$errors[] = 'Введите email';
		}
		if(!preg_match("{[a-zA-Z0-9_]+@[mail.ru||gmail.com||ukr.net]}xs",trim($data['email']))){
			$errors[] = 'Email может содержать буквы латинского алфавита и "_","@","." Пример: User_123@mail.ru';
		}
		if(empty($data['password_1'])){
			$errors[] = 'Придумайте пароль';
		}
		if(!(strlen($data['password_1'])>7 && strlen($data['password_1'])<17)){
			$errors[] = 'Пароль должен содержать от 8 до 16 символов!';
		}
		if(!preg_match("|[a-zA-Z0-9_]+|xs",trim($data['password_1']))){
			$errors[] = 'Пароль может содержать буквы латинского алфавита и "_" Пример: My_password123';
		}
		if(empty($data['password_2'])){
			$errors[] = 'Подтвердите пароль';
		}
		if($data['password_1']!=$data['password_2']){
			$errors[] = 'Пароли не совподают';
		}
		if(empty($errors)){
			//нету ошибок регистрируем пользователя
			$user_reg = new user_reg($data['login'],$data['password_1'],$data['email']);
			$_SESSION['connection'] = trim($data['login']);
			header('location:/');
		}else{
			//есть ошибки выводим их
			require_once($_SERVER['DOCUMENT_ROOT'].'/unauthorized/checkin/singIn.html.php');
		}
	}else{
		//выводим страцицу
		require_once($_SERVER['DOCUMENT_ROOT'].'/unauthorized/checkin/singIn.html.php');
	}