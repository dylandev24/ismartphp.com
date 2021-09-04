<!DOCTYPE html>
<html>

<head>
    <title>ISMART STORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost:81/project/ismart.com/">
    <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />
    <?php get_script(); ?>

</head>

<body>
    <script>
        // swal({
        //     title: "Good job!",
        //     text: "You clicked the button!",
        //     icon: "success",
        //     button: "Aww yiss!",
        // });
    </script>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">

                                <li>
                                    <a href="trang-chu.html" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="danh-muc/dien-thoai.html" title="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="danh-sach-bai-viet.html" title="">Tin tức</a>
                                </li>
                                <li>
                                    <a href="gioi-thieu.html" title="">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="lien-he.html" title="">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="trang-chu.html" title="" id="logo" class="fl-left"><img src="public/images/logo.png" /></a>
                        <div id="search-wp" class="fl-left">
                            <form method="GET" action="">
                                <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s">Tìm kiếm</button>
                            </form>
                            <ul id="result" class="dropdown-search">

                            </ul>

                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">0987.654.321</span>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <a href="gio-hang.html" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">2</span>
                            </a>
                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart">
                                    <a href="gio-hang.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                    <span id="num"><?php if (!empty($_SESSION['cart']['buy'])) {
                                                        echo count($_SESSION['cart']['buy']);
                                                    } else {
                                                        echo 0;
                                                    };
                                                    ?></span>
                                </div>
                                <div id="dropdown">
                                    <?php if (!empty($_SESSION['cart']['buy'])) {
                                    ?>
                                        <p class="desc">Có <span id="count"><?php if (!empty($_SESSION['cart']['buy'])) echo count($_SESSION['cart']['buy']); ?> sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            <?php foreach ($_SESSION['cart']['buy'] as $item) { ?>
                                                <li class="clearfix">
                                                    <a href="gio-hang.html" title="" class="thumb fl-left">
                                                        <img class="img_cart" src="uploads/products/<?php echo $item['image'] ?>" alt="<?php echo $item['name'] ?>">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="gio-hang.html" id="name" title="<?php echo $item['name'] ?>" class="product-name"><?php echo $item['name'] ?></a>
                                                        <p class="price" id="price"><?php echo currency_format($item['price']) ?></p>
                                                        <p class="qty" id="qty">Số lượng: <?php echo $item['qty'] ?></p>
                                                    </div>
                                                </li>
                                            <?php }
                                            ?>
                                        </ul>
                                        <div class="action-cart clearfix">
                                            <a href="gio-hang.html" title="Xem giỏ hàng của bạn" class="checkout fl-right">Vào giỏ hàng</a>
                                        </div>
                                    <?php
                                    } else {
                                        echo "<p class='alert_cart'>Bạn chưa có sản phẩm nào ^^!</p>";
                                        echo "<img src='public/images/alert_cart.jpg'>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>