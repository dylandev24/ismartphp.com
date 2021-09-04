<?php
function construct()
{
    //    echo "Dùng chung, load đầu tiên";
    load_model('index');
    load_model('pag');
    load('helper', 'format');
}

function indexAction()
{
    $list_product = get_list_product();
    $temp = 0;
    foreach ($list_product as $item) {
        $temp++;
        $output = '
                <tr>
                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                    <td><span class="tbody-text">' . $temp . '</h3></span>
                    <td><span class="tbody-text">' . $item['product_code'] . '</h3></span>
                    <td>
                        <div class="tbody-thumb">
                            <img src="../uploads/products/' . $item['image'] . '" alt="">
                        </div>
                    </td>
                    <td class="clearfix">
                        <div class="tb-title fl-left">
                            <a href="" title="">' . $item['product_name'] . '</a>
                        </div>
                        <ul class="list-operation fl-right">
                            <li><a href="?mod=product&action=edit&id=' . $item['id'] . '" data-id-edit="' . $item['id'] . '" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                            <li><a href="?mod=product&action=delete&id=' . $item['id'] . '" data-id-del="' . $item['id'] . ' title=" Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                        </ul>
                    </td>

                    <td><span class="tbody-text">' . currency_format($item['price']) . '</span></td>
                    <td><span class="tbody-text">' . $item['category'] . '</span></td>
                    <td><span class="tbody-text">' . $item['status'] . '</span></td>
                    <td><span class="tbody-text"> ' . $item['user_create'] . ' </span></td>
                    <td><span class="tbody-text">' . $item['create_time'] . '</span></td>
                </tr>
                ';
        echo json_encode($output);
    }
}
