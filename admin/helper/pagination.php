<?php
function pagging($sql, $where = "", $num_per_page = 2)
{
    $num_rows = db_num_rows("{$sql}");
    // so luong ban ghi tren trang
    $num_per_page = $num_per_page;
    $total_rows = $num_rows;
    $num_page = ceil($total_rows / $num_per_page);

    //Tinh duoc diem xuat phat
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    $list_pages = get_pages($start, $num_per_page, "{$where}");
    $result = array(
        'num_page' => $num_page,
        'page' => $page,
        'list_pages' => $list_pages
    );
    return $result;
}
function pagging_ajax($sql, $where = "", $num_per_page = 2, $page)
{
    $num_rows = db_num_rows("{$sql}");
    // so luong ban ghi tren trang
    $num_per_page = $num_per_page;
    $total_rows = $num_rows;
    $num_page = ceil($total_rows / $num_per_page);

    //Tinh duoc diem xuat phat
    $page = $page;
    $start = ($page - 1) * $num_per_page;
    $list_pages = get_pages($start, $num_per_page, "{$where}");
    $result = array(
        'num_page' => $num_page,
        'list_pages' => $list_pages
    );
    return $result;
}
function get_pages($start = 1, $num_per_page = 10, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE {$where} ";
    }
    $list_users = db_fetch_array("SELECT * FROM `tbl_product` {$where} LIMIT {$start}, $num_per_page");
    return  $list_users;
}
// function get_pagging($num_page, $page, $base_url = "")
// {
//     $str_pagging = "<ul class='pagging'>";
//     if ($page > 1) {
//         $page_prev = $page - 1;
//         $str_pagging .= "<li><a href=\"{$base_url}&page={$page_prev}\" data-id =" . $page_prev . ">Before</a></li>";
//     }
//     for ($i = 1; $i <= $num_page; $i++) {
//         $active = "";
//         if ($i == $page) {   
//             $active = "class = 'active'";
//         }
//         $str_pagging .= "<li {$active}><a href=\"{$base_url}&page={$i}\" data-id =" . $i . ">$i</a></li>";
//     }
//     if ($page < $num_page) {
//         $page_next = $page + 1;
//         $str_pagging .= "<li><a href=\"{$base_url}&page={$page_next}\" data-id =" . $page_next . ">After</a></li>";
//     }
//     $str_pagging .= "</ul>";
//     return $str_pagging;
// }
