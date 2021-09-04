<?php

function get_list_add_cart()
{
    $result = db_fetch_array("SELECT * FROM `tbl_cart`");
    return $result;
}
function get_list_cart_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_cart` WHERE `id` = {$id}");
    return $item;
}
function get_info_cart()
{
    if (!empty($_SESSION['cart']['buy'])) {
        return $_SESSION['cart']['buy'];
    }
    return FALSE;
}
function get_product_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_product` WHERE `id` = {$id}");
    return $item;
}

function add_cart($id)
{
    global $conn;
    $add = "INSERT INTO `tbl_cart`(`code`,`image`,`name`,`price`)
    SELECT `product_code`,`image`,`product_name`,`price` FROM `tbl_product` WHERE `id` = {$id}";

    $check = mysqli_query($conn, $add);
    if (!empty($check)) {
        return true;
    }
    return false;
}

function add($id)
{

    $get_info_product = get_product_by_id($id);
    if (!empty($_SESSION['cart'][$id]['qty'])) {
        $qty = $_SESSION['cart'][$id]['qty'];
    } else {
        $qty = 1;
    }
    if (!empty($_SESSION['cart'][$id]['qty'])) {
        if (isset($_SESSION['cart']['buy']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
            $qty = $_SESSION['cart']['buy'][$id]['qty'] + $qty;
        }
    } else {
        if (isset($_SESSION['cart']['buy']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
            $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        }
    }
    $_SESSION['cart']['buy'][$id] = array(
        'id' => $get_info_product['id'],
        'code' => $get_info_product['product_code'],
        'image' => $get_info_product['image'],
        'name' => $get_info_product['product_name'],
        'price' => $get_info_product['price'],
        'qty' => $qty,
        'total_price' => $get_info_product['price'] * $qty
    );
    // $code = $data['code'];
    // $total_price = $data['total_price'];
    // if (db_update('tbl_cart', array('qty' => $qty, 'total_price' => $total_price), "`code` = '{$code}'")) {
    //     return true;
    // } else {
    //     db_insert('tbl_cart', $data);
    // }
    update_info_cart();
}
function update_info_cart()
{
    $qty = 0;
    $total = 0;
    foreach ($_SESSION['cart']['buy'] as $item) {
        $qty += $item['qty'];
        $total += $item['total_price'];
    }
    $_SESSION['cart']['info'] = array(
        'qty' => $qty,
        'total' => $total
    );
}

function delete_cart($id)
{
    if (!empty($id)) {
        unset($_SESSION['cart']['buy'][$id]);
        // return db_delete('tbl_cart', "`id` = '{$id}'");
    } else {
        unset($_SESSION['cart']);
    }
    update_info_cart();
}

function update_cart($qty, $total_price, $id, $total)
{
    return db_update('tbl_cart', array('qty' => $qty, 'total' => $total, 'total_price' => $total_price), "`id` = '{$id}'");
}

// function get_session_by_db($id)
// {
//     $get_cart = get_list_cart_id($id);
//     if (empty($_SESSION['cart'])) {
//         if (!empty($get_cart)) {
//             $_SESSION['cart']['buy'][$id] = array(
//                 'price' => $get_cart['price'],
//             );
//             $_SESSION['cart']['info'] = array(
//                 'total' => $get_cart['total']
//             );
//         }
//     }
// }
