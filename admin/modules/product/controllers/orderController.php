<?php
function construct()
{
    //    echo "Dùng chung, load đầu tiên";
    load_model('index');
    load('helper', 'format');
}
function orderAction()
{
    $list_order = get_order();
    $data['list_order'] = $list_order;
    load_view('order', $data);
}
function customerAction()
{
    $list_order = get_order();
    $data['list_order'] = $list_order;
    load_view('customer', $data);
}

function detailAction()
{
    $id = $_GET['id'];
    $list_order = get_order_by_id($id);
    $data['list_order'] = $list_order;
    load_view('detail', $data);
}
function deleteAction()
{
    $id = $_GET['id'];
    if (delete_order_id($id)) {
        $_SESSION['status_order'] = 'ok';
        redirect('?mod=product&controller=order&action=order');
    }
}
