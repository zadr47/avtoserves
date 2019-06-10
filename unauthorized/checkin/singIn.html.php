<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Singln</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/unauthorized/checkin/singIn.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
</head>
<body>
    <div class="header">
        <a href="/index.php">
            <img class="logo" src="/img/icon%20копия.png" alt="logo">
            <p class="helper">Helper</p>
        </a>
        <a href="/unauthorized/authorization/authorization.php"><p class="logIn">Log In</p></a>
    </div>
    <form action = '/unauthorized/checkin/checkin.php' method='POST'>
        <input class="log" type='text' name='login' placeholder="login"  autocomplete="off"><br/>
        <hr class="line1">
        <input class="pass1" type='password' name='password_1' placeholder="password"  autocomplete="off"><br/>
        <hr class="line2">
        <input class="pass2" type='password' name='password_2' placeholder="confirm password"  autocomplete="off"><br/>
        <hr class="line3">
        <input class="email" type='text' name='email' placeholder="email"  autocomplete="off"><br/>
        <hr class="line4">
        <input class="inp" type='submit' name='do_checkin'><br/>
    </form>

    <p class="exeption"><?php echo $errors[0] ?></p>

</body>
</html>