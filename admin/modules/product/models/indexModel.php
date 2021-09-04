<?php

function get_list_product()
{
    $result = db_fetch_array("SELECT * FROM `tbl_product`");
    return $result;
}

function get_list_product_id($id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_product` where `id` = {$id}");
    return $result;
}

function get_product_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_product` WHERE `id` = {$id}");
    return $item;
}


function add_product($data)
{
    $add_product = db_insert('tbl_product', $data);
    return $add_product;
}

function delete_product_by_id($id)
{

    db_delete('tbl_product', "`id` = '{$id}'");
}

function num_row()
{
    return db_num_rows("SELECT * FROM `tbl_product`");
}

function num_delete()
{
    return db_num_rows("SELECT * FROM `tbl_delete_product`");
}
function save_delete_product($data)
{
    $save = db_insert('tbl_delete_product', $data);
    return $save;
}

function update_product($data, $id)
{
    return db_update("tbl_product", $data, "`id`='$id'");
}

function get_page($start = 1, $num_per_page = 10)
{
    $list_users = db_fetch_array("SELECT * FROM `tbl_users`  LIMIT $start,$num_per_page");
    return $list_users;
}

//================================= ORDER ====================================

function get_order()
{
    $result = db_fetch_array("SELECT * FROM `tbl_order`");
    return $result;
}

function get_order_by_id($id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_order` WHERE `id` = '{$id}'");
    return $result;
}

function count_order()
{
    return db_num_rows("SELECT * FROM `tbl_order`");
}

function add_img_thumb($product_code, $product_name, $image_thumb)
{
    global $conn;
    $sql = "INSERT INTO `tbl_product_thumb`(`product_code`,`product_name`,`image`) VALUES('{$product_code}','{$product_name}','{$image_thumb}')";
    $a = mysqli_query($conn, $sql);
    if (!empty($a)) {
        return true;
    }
    return false;
}

function search_by_text($name)
{
    return  db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_name` LIKE '%$name%' LIMIT 5");
}

function delete_order_id($id)
{
    return db_delete('tbl_order', "`id` = '{$id}'");
}

function num_order()
{
    return db_num_rows("SELECT * FROM `tbl_order`");
}
