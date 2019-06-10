<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="header">
        <a href="/index.php">
            <img class="logo" src="/img/icon%20копия.png" alt="logo">
            <p class="helper">Helper</p>
        </a>
        <a href="/unauthorized/checkin/checkin.php"><p class="logIn">SignIn</p></a>
    </div>
     <form action = '/unauthorized/authorization/authorization.php' method='POST'>
         <input class="log" type='text' name='login' placeholder="login" autocomplete="off"><br/>
         <hr class="line1">
         <input class="pass" type='password' name='password' placeholder="password" autocomplete="off"><br/>
         <hr class="line2">
         <input class="inp" type='submit' name='do_authorization'><br/>
     </form>

    <p class="exeption"><?php echo $errors[0] ?></p>

</body>
</html>