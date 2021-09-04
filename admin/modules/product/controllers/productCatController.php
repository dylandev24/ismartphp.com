<?php
function construct()
{
    //    echo "Dùng chung, load đầu tiên";
    load_model('index');
    load('helper', 'format');
}

function pagination()
{
    $num_rows = db_num_rows("SELECT * FROM `tbl_product_cat`");
    // so luong ban ghi tren trang
    $num_per_page = 5;
    $total_rows = $num_rows;
    $num_page = ceil($total_rows / $num_per_page);

    //Tinh duoc diem xuat phat
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    $product_cat = get_product_cat_pages($start, $num_per_page);
    // show_array($page_info);
    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['product_cat'] = $product_cat;
    load_view('product_cat', $data);
}
