<?php

function get_list_product()
{
    $result = db_fetch_array("SELECT * FROM `tbl_product`");
    return $result;
}

function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}

function get_list_slider()
{
    $result = db_fetch_array("SELECT * FROM `tbl_slider` ORDER BY `priority` ASC");
    return $result;
}
function search_by_text($name)
{
    return  db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_name` LIKE '%$name%' LIMIT 5");
}
