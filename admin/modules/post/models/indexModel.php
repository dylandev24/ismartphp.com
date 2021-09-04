<?php

function get_list_post()
{
    $result = db_fetch_array("SELECT * FROM `tbl_post`");
    return $result;
}

function get_post_by_id($id)
{
    $item = db_fetch_array("SELECT * FROM `tbl_post` WHERE `id` = {$id}");
    return $item;
}

function add_post($data)
{
    return db_insert('tbl_post', $data);
}

function delete_post_by_id($id)
{
    return db_delete('tbl_post', "`id` = '{$id}'");
}

function row_post()
{
    return db_num_rows("SELECT * FROM `tbl_post`");
}

function update_post($data, $id)
{
    return db_update('tbl_post', $data, "`id` = '{$id}'");
}
