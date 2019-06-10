<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/session.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/class.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/function.php');

	if(isset($_SESSION['connection'])){
		header('location:/');
	}
	require_once($_SERVER['DOCUMENT_ROOT'].'/unauthorized/Index.html');













	/*
	echo "<a href='/index.php'>Главная страница<a/>";
	echo "<br />";
	echo "<a href='".path_to_authorization_page."'>Авторизироаться<a/>";
	echo "<br />";
	echo "<a href='".path_to_checkin_page."'>Зарегистрироваться<a/>";
	echo "<br />";
	echo "<a href='".path_to_restore_password_page."'>Востоновить пароль<a/>";

