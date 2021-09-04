<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction()
{
    $list_page = get_list_page();
    $data['list_page'] = $list_page;
    load_view('index', $data);
}
function deleteAction()
{
    // $id = $_GET['id'];
    // if (get_page_by_id($id)) {
    $date_remove = date('d/m/Y');
    $user_remove = $_SESSION['use_login'];
    $id = $_POST['id'];
    delete_page_by_id($id);
    $data = array(
        'name_page' => $id,
        'user_remove' => $user_remove,
        'date_remove' => $date_remove
    );
    save_delete_page($data);
}
function addAction()
{
    global $name_page, $slug, $error;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (empty($_POST['title'])) {
            $error['title'] = "Không được bỏ trống !";
        } else {
            $name_page = $_POST['title'];
        }

        if (empty($_POST['slug'])) {
            $error['slug'] = "Không được bỏ trống !";
        } else {
            $slug = $_POST['slug'];
        }

        if (empty($error)) {
            $user_create = $_SESSION['use_login'];
            $date_create = date('d/m/Y');
            $data = array(
                'name_page' => $name_page,
                'slug' => $slug,
                'user_create' => $user_create,
                'date_create' => $date_create
            );
            add_page($data);
        }
    }
    load_view('add');
}

function editAction()
{
}
