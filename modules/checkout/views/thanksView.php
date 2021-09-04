<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: #fbf0f2;
    }

    div {
        width: 500px;
        margin: 0px auto;
    }

    h1,
    h2,
    p {
        text-align: center;
        font-family: cursive;
    }

    a.home {
        background-color: pink;
        text-decoration: none;
        padding: 15px 30px;
        /* justify-content: center; */
        display: block;
        text-align: center;
        margin: 0px auto;
        width: 120px;
        border-radius: 20px;
        font-family: cursive;
    }

    img {
        width: 100%;
        position: relative;
    }

    a.home:hover {
        background-color: #fbdfe4;
        transition: 0.3s;

    }

    h1 {
        margin-bottom: 32px;
    }

    .abs {
        position: absolute;
        top: 330px;
    }
</style>

<body>
    <div>
        <img src="public/images/message.png">
        <div class="abs">
            <h1>Thank you ♥</h1>
            <h2>Bạn đã mua hàng thành công !</h2>
            <p>Vui lòng kiểm tra <a href="https://mail.google.com/" target="blank">"gmail"</a> để xem lại thông tin đơn hàng của bạn !. Quay trở lại trang chủ</p>
            <a class="home" href="trang-chu.html">
                << BACK HOME</a>
        </div>
    </div>
</body>

</html>