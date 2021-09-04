<?php

function construct()
{
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{
    $list_product = get_list_product();
    $list_slider = get_list_slider();
    $data['list_product'] = $list_product;
    $data['list_slider'] = $list_slider;
    load_view('index', $data);
}

function searchAction()
{
    if (isset($_POST['search'])) {
        $name = $_POST['search'];
        $list_product = search_by_text($name);
        foreach ($list_product as $item) {
            echo $output = '
            <a href="chi-tiet-san-pham-' . $item['id'] . '/' . make_url($item['product_name']) . '.html">
                <img src="uploads/products/' . $item['image'] . '" alt="" class="">
                <div class="">
                    <span class="pr-name">
                    ' . $item['product_name'] . '
                    </span>
                    <span class="pr-price">' . currency_format($item['price'])  . '</span>
                </div>
            </a>                          
            ';
        }
    }
    if (empty($output)) {
        echo '<span class="s_404">Không tìm thấy tìm kiếm của bạn...</span><img class="search_404" src="public/images/search.jpg">';
    }
}

function addAction()
{
    echo "Thêm dữ liệu";
}
