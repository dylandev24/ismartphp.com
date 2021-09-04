<?php

function get_list_product()
{
    $result = db_fetch_array("SELECT * FROM `tbl_product`");
    return $result;
}
function get_list_cat_product($cat_name)
{
    $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_name` LIKE'%{$cat_name}%'");
    return $result;
}
function get_list_product_id($id)
{
    $item = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id` = '{$id}'");
    return $item;
}

function get_brand()
{
    $result = db_fetch_array("SELECT DISTINCT `brand` FROM `tbl_product` WHERE `status` = 'Đã đăng' AND `category` = 'Điện thoại'");
    return $result;
}

function get_brand_laptop()
{
    $result = db_fetch_array("SELECT DISTINCT `brand` FROM `tbl_product` WHERE `status` = 'Đã đăng' AND `category` = 'Laptop'");
    return $result;
}

function list_price()
{
    $result = db_fetch_array("SELECT DISTINCT `price` FROM `tbl_product` WHERE `status` = 'Đã đăng' AND `category` = 'Điện thoại'");
    return $result;
}

function num_row()
{
    return db_num_rows("SELECT * FROM `tbl_product`");
}

function num_row_phone()
{
    return db_num_rows("SELECT * FROM `tbl_product` WHERE `category`='Điện thoại'");
}
function num_row_laptop()
{
    return db_num_rows("SELECT * FROM `tbl_product` WHERE `category`='Laptop'");
}
