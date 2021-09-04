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
