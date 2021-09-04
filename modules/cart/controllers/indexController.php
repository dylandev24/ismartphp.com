<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{
    // $list_cart = get_list_add_cart();
    // $data['list_cart'] = $list_cart;
    // load_view('index', $data);
    $list_cart = get_info_cart();
    $data['list_cart'] = $list_cart;
    load_view('index', $data);
}

function addAction()
{
    $id = (int)$_GET['id'];
    // $id = isset($_POST['id']) ? (int)$_POST['id'] : '';
    $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : '';
    add($id);
    $count = count($_SESSION['cart']['buy']);
    $image = $_SESSION['cart']['buy'][$id]['image'];
    $name = $_SESSION['cart']['buy'][$id]['name'];
    $price = $_SESSION['cart']['buy'][$id]['price'];
    $qty = $_SESSION['cart']['buy'][$id]['qty'];
    $data = array(
        'image' => $image,
        'product_name' => $name,
        'price' => $price,
        'qty' => $qty,
        'count' => $count,
    );
    echo json_encode($data);
}
function add_liveAction()
{
    $id = (int)$_GET['id'];
    add($id);
    redirect("gio-hang.html");
}
function editAction()
{
    $id = (int)$_GET['id'];
    $item = get_user_by_id($id);
    show_array($item);
}

function deleteAction()
{
    $id = isset($_GET['id']) ? (int)$_GET['id'] : '';
    delete_cart($id);
    $total = $_SESSION['cart']['info']['total'];
    $count = count($_SESSION['cart']['buy']);
    $data = array(
        'total' => currency_format($total),
        'count' => $count
    );
    echo json_encode($data);
}

function updateAction()
{
    $id = isset($_POST['id']) ? (int)$_POST['id'] : '';
    $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : '';
    $_SESSION['cart']['buy'][$id]['qty'] = $qty;
    $_SESSION['cart']['buy'][$id]['total_price'] = $_SESSION['cart']['buy'][$id]['price'] * $qty;
    update_info_cart();
    $sub_total = $_SESSION['cart']['buy'][$id]['total_price'];
    $total = $_SESSION['cart']['info']['total'];
    $data = array(
        'total' => currency_format($total),
        'total_price' => currency_format($sub_total)
    );
    // update_cart($qty, $sub_total, $id, $total);
    echo json_encode($data);
}

function unsetAction()
{
    unset($_SESSION['cart']);
}
