<?php

function get_list_slider()
{
    $result = db_fetch_array("SELECT * FROM `tbl_slider` ORDER BY `priority` ASC");
    return $result;
}

function get_list_slider_id($id)
{
    $item = db_fetch_array("SELECT * FROM `tbl_slider` WHERE `id` = '{$id}' ORDER BY `priority` ASC ");
    return $item;
}

function add_slider($data)
{
    return db_insert('tbl_slider', $data);
}
