<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>ห้างหุ้นส่วนจำกัด ฟ้ารุ่งชนธวัช 2014</title>

</head>
<body>
   <div class="box">
    <div class="container">
    <form action="signin_db.php" method="post">

        <div class="top">
            <span>ห้างหุ้นส่วนจำกัด ฟ้ารุ่งชนธวัช 2014</span>
            <header>Login</header>
        </div>

        <div class="input-field">
            <input type="text" class="input" placeholder="Username" name="email" aria-describedby="email">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <label for="password" label>
            <input type="Password" class="input"  name="password">
            <i class='bx bx-lock-alt'></i>
        </div>

        <div class="input-field">
            <input type="submit" class="submit" value="Login" name="signin">
        </div>

        <div class="two-col">
            <div class="one">
               <input type="checkbox" name="" id="check">
               <label for="check"> Remember Me</label>
            </div>
            <div class="two">
                <label><a href="index.php">Forgot password?</a></label>
            </div>
        </div>
        </form>
    </div>
</div>  
</body>
</html>