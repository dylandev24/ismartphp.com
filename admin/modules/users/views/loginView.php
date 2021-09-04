<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/import/login.css">
    <title>Login</title>
</head>

<body>
    <div id="box">
        <form action="" method="POST">
            <h2>ADMIN</h2>
            <?php global $error, $t; ?>
            <input type="text" name="username" placeholder="Tên đăng nhập" value="<?php if (!empty($username)) echo $username; ?>">
            <p><?php if (!empty($error['username'])) echo $error['username'] ?></p>
            <input type="password" name="password" placeholder="Mật khẩu">
            <p><?php if (!empty($error['password'])) echo $error['password'] ?></p>

            <button type="submit" name="btn_login">Đăng nhập</button>
            <p><?php echo $t ?></p>
            <img src="public/images/admin_login.png" alt="">
        </form>
    </div>
</body>

</html>