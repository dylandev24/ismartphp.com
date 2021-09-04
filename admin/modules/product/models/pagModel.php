<?php
function get_pagging($num_page, $page, $base_url = "")
{
    $str_pagging = "<ul class='pagging'>";
    if ($page > 1) {
        $page_prev = $page - 1;
        $str_pagging .= "<li id=''><a href=\"{$base_url}&page={$page_prev}\" data-id = '$page_prev'><i class='fa fa-angle-double-left'></i></a></li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
        $active = "";
        if ($i == $page) {
            $active = "class = 'active'";
        }
        $str_pagging .= "<li id='$i' {$active}><a class='num_pagination' href=\"{$base_url}&page={$i}\" data-prd=" . $i . " data-id =" . $page . ">$i</a></li>";
    }
    if ($page < $num_page) {
        $page_next = $page + 1;
        $str_pagging .= "<li id='$i'><a href=\"{$base_url}&page={$page_next}\" data-id = '$page_next'><i class='fa fa-angle-double-right'></i></a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}

function get_product_cat_pages($start = 1, $num_per_page = 10, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE {$where} ";
    }
    $list_users = db_fetch_array("SELECT * FROM `tbl_product_cat` {$where} LIMIT {$start}, $num_per_page");
    return  $list_users;
}
