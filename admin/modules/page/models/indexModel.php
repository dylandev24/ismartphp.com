<?php

function get_list_page()
{
    $result = db_fetch_array("SELECT * FROM `tbl_page`");
    return $result;
}

function get_page_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_page` WHERE `id` = {$id}");
    return $item;
}

function add_page($data)
{
    $add_page = db_insert('tbl_page', $data);
    return $add_page;
}

function delete_page_by_id($id)
{

    db_delete('tbl_page', "`id` = '{$id}'");
}

function num_row()
{
    return db_num_rows("SELECT * FROM `tbl_page`");
}
function num_row_delete()
{
    return db_num_rows("SELECT * FROM `tbl_delete_page`");
}
function num_delete()
{
    return db_num_rows("SELECT * FROM `tbl_delete_page`");
}
function save_delete_page($data)
{
    $save = db_insert('tbl_delete_page', $data);
    return $save;
}
