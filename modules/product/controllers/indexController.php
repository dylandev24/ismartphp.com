<?php

function construct()
{
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{

    $list_product = get_list_product();
    $list_brand = get_brand();
    $data['list_product'] = $list_product;
    $data['list_brand'] = $list_brand;
    load_view('index', $data);
}

function detailAction()
{
    $id = $_GET['id'];
    $list_product = get_list_product();
    $list_product = get_list_product_id($id);
    $data['list_product'] = $list_product;
    load_view('detail', $data);
}
function laptopAction()
{
    $list_product = get_list_product();
    $list_brand = get_brand_laptop();
    $data['list_product'] = $list_product;
    $data['list_brand'] = $list_brand;
    load_view('laptop', $data);
}

function phoneAction()
{
    global $cat_name, $list_product;
    load('helper', 'pagination');
    //======= PHAN TRANG ===========

    $result = pagging("SELECT * FROM `tbl_product` WHERE `category` = 'Điện thoại'", "", 2);
    $data = array(
        'num_page' => $result['num_page'],
        'page' => $result['page'],
        'list_product' => $result['list_pages']
    );
    $list_brand = get_brand();
    $data['list_brand'] = $list_brand;
    load_view('phone', $data);
}
