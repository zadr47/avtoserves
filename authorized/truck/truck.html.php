<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make an order</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/authorized/truck/truck.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
</head>
<body>

<div class="header">
    <img class="logo" src="/img/icon%20копия.png" alt="logo">
    <a href="/index.php" ><p class="helper">Helper</p></a>
    <a href="/ever/logout.php"><p class="logIn">Logout</p></a>

    <form action = '/authorized/truck/truck.php' method='POST'>
        <input class="name" type='text' name='name' placeholder="name"><br/>
        <hr class="line1">
        <input class="phone" type='text' name='phone' placeholder="phone"><br/>
        <hr class="line2">
        <input class="car" type='text' name='type_of_you_car' placeholder="type of you car"><br/>
        <hr class="line3">
        <input class="card" type='text' name='card_number' placeholder="card number"><br/>
        <hr class="line4">
        <input class="cvc" type='password' name='cvc' placeholder="CVC"><br/>
        <hr class="line5">
        <input class="call" type='submit' name='do_truck' value="Call Truck"><br/>

    </form>

    <p class="exeption"><?php echo $errors[0] ?></p>
</div>
</body>
</html>