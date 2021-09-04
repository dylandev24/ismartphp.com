<?php


function construct()
{
    load_model('index');
    load('helper', 'format');
}
function indexAction()
{
    global $conn;
    if (isset($_POST['action'])) {
        if ($_POST['id'] == 1) {
            $query = "SELECT * FROM `tbl_product` WHERE `status` ='Đã đăng' AND `category` = 'Điện thoại' ";
        } else {
            $query = "SELECT * FROM `tbl_product` WHERE `status` ='Đã đăng' AND `category` = 'Laptop' ";
        }
    }
    if (isset($_POST['brand'])) {
        $brand_filter = implode("','", $_POST['brand']);
        $query .= "AND `brand` IN('" . $brand_filter . "') ";
    }
    if (isset($_POST['price'])) {
        if ($_POST['price'] == 1) {
            $query .= "AND `price` >= 20000000";
        } else if ($_POST['price'] == 0) {
            $query .= "AND `price` > 1 ";
        } else {
            $query .= "AND `price` <= 20000000 ";
        }
    }
    if (isset($_POST['price_prd'])) {
        if ($_POST['price_prd'] == 'asc') {
            $query .= " ORDER BY `price` ASC";
        } else if ($_POST['price_prd'] == 'desc') {
            $query .= " ORDER BY `price` DESC";
        }
    }
    $data = '';
    if (!empty(mysqli_query($conn, $query))) {
        foreach (mysqli_query($conn, $query) as $item) {
            $data = '
            <li>
                <a href="?mod=product&action=detail&id=' . $item['id'] . '" title="" class="thumb">
                    <img id="product_img" src="uploads/products/' . $item['image'] . '">
                </a>
                <a href="?mod=product&action=detail" title="" class="product-name">' . $item['product_name'] . '</a>
                <div class="price">
                    <span class="new">' . currency_format($item['price']) . '</span>
                    <span class="old">' . currency_format($item['price_old']) . '</span>
            </div>
            <div class="action clearfix">
                <button id="add-to-cart" data-id-product="' . $item['id'] . '" title="Thêm vào giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</button>
                <a href="?mod=cart&action=add_live&id=' . $item['id'] . '" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                </div>
            </li>
            ';
            echo $data;
        }
    } else {
        echo '<h3>Không tìm thấy !</h3>';
    }
}


function laptopAction()
{
    global $conn;
    if (isset($_POST['action'])) {
        $query = "SELECT * FROM `tbl_product` WHERE `status` ='Đã đăng' ";
    }
    if (isset($_POST['brand'])) {
        $atr = explode(' ', $_POST['brand']);
        $brand_filter = implode("','", $atr);
        $query .= "AND `brand` IN('" . $brand_filter . "') ";
    }
    if (isset($_POST['price'])) {
        if ($_POST['price'] == 1) {
            $query .= "AND `price` >= 20000000";
        } else if ($_POST['price'] == 0) {
            $query .= "AND `price` > 1 ";
        } else {
            $query .= "AND `price` <= 20000000 ";
        }
    }
    if (isset($_POST['price_prd'])) {
        if ($_POST['price_prd'] == 'asc') {
            $query .= " ORDER BY `price` ASC";
        } else if ($_POST['price_prd'] == 'desc') {
            $query .= " ORDER BY `price` DESC";
        }
    }
    $data = '';
    if (!empty(mysqli_query($conn, $query))) {
        foreach (mysqli_query($conn, $query) as $item) {
            $data = '
            <li>
                <a href="?mod=product&action=detail&id=' . $item['id'] . '" title="" class="thumb">
                    <img id="product_img" src="uploads/products/' . $item['image'] . '">
                </a>
                <a href="?mod=product&action=detail" title="" class="product-name">' . $item['product_name'] . '</a>
                <div class="price">
                    <span class="new">' . currency_format($item['price']) . '</span>
                    <span class="old">' . currency_format($item['price_old']) . '</span>
            </div>
            <div class="action clearfix">
                <button id="add-to-cart" data-id-product="' . $item['id'] . '" title="Thêm vào giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</button>
                <a href="?mod=cart&action=add_live&id=' . $item['id'] . '" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                </div>
            </li>
            ';
            echo $data;
        }
    } else {
        echo '<h3>Không tìm thấy !</h3>';
    }
}
