<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{
    $list_users = get_list_users();
    $data['list_users'] = $list_users;
    load_view('index', $data);
}

function detailAction()
{
    $id = $_GET['id'];
    $list_post = get_post_by_id($id);
    $data['list_post'] = $list_post;
    load_view('detail', $data);
}

function editAction()
{
    $id = (int)$_GET['id'];
    $item = get_user_by_id($id);
    show_array($item);
}
