<?php
function get_list_cart()
{
    $result = db_fetch_array("SELECT * FROM `tbl_cart`");
    return $result;
}

function row_cart()
{
    return db_num_rows("SELECT * FROM `tbl_cart`");
}

function get_list_product()
{
    $result = db_fetch_array("SELECT * FROM `tbl_product`");
    return $result;
}
