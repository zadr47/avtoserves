<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<a href='/index.php'>Главная страница</a>

	<form action="<?php path_to_restore_password_page ?>" method="POST">

		<input type="text" name="login" placeholder="ваш логин">
		<input type="submit" name="do_restore_password" value="востановить пароль">

	</form>

	<a href='/unauthorized/authorization/authorization.php'>Авторизироваться</a>
	<a href='/unauthorized/checkin/checkin.php'>Зарегистрироваться</a>

</body>
</html>