<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/session.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/class.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/ever/function.php');

	if(!isset($_SESSION['connection'])){
		header('location:/');
	}
	$data = $_REQUEST;
	if(isset($data['do_truck'])){
		//обработываем и чет делаем
		$errors = [];
		if(empty($data['name'])){
			$errors[] = 'Укажите ваше имя!';
		}
		if(empty($data['phone'])){
			$errors[] = 'Укажите ваш номер телефона!';
		}
		if(preg_match("/\380[0-9]{9}/sx",$data['phone'])){
			$errors[] = 'Номер должен начинаться на "380"<br />и состоять из 12 символов!';
		}
		if(empty($data['type_of_you_car'])){
			$errors[] = 'Укажите марку тип вашего авто!';
		}
		if(empty($data['card_number'])){
			$errors[] = 'Уажите номер карты!';
		}
		if(strlen($data['card_number'])!=16){
			$errors[] = 'Номер карты должен<br />содержать 16 символов!';			
		}
		if(empty($data['cvc'])){
			$errors[] = 'Укажите cvc-код!';
		}
		if(strlen($data['cvc'])!=3){
			$errors[] = 'cvc-код должен содержать 3 цифры';
		}
		if(empty($errors)){
			//ошибок нету можно чет делать
			echo "<script type='text/javascript'>";
			echo "alert('Ваш вызов отпрвлен!');";
			echo "</script>";
			echo "<a href='/index.php'>Назад</a>";
		}else{
			//вывести ошиьку
			require_once($_SERVER['DOCUMENT_ROOT'].'/authorized/truck/truck.html.php');			
		}
	}else{
		require_once($_SERVER['DOCUMENT_ROOT'].'/authorized/truck/truck.html.php');
	}
	