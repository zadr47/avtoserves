<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/session.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/class.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/function.php');

	if(!isset($_SESSION['connection'])){
		header('location:/');
	}
	

	require_once($_SERVER['DOCUMENT_ROOT'].'/authorized/option.html');
	

	//echo "<a href='/ever/logout.php'>выйти</a>";