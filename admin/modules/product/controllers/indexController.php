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
    load('helper', 'pagination');
    // $list_product = get_list_product();
    // $data['list_product'] = $list_product;
    //======= PHAN TRANG ===========
    $result = pagging("SELECT * FROM `tbl_product`", "", 5);
    $data = array(
        'num_page' => $result['num_page'],
        'page' => $result['page'],
        'list_product' => $result['list_pages']
    );
    load_view('index', $data);
}


function addAction()
{
    $create_time = date('d/m/Y');
    global $error, $product_name, $product_code, $price, $desc, $detail_post, $status, $parent_id, $username;
    if (isset($_POST['btn_add'])) {
        $error = array();
        if (empty($_POST['product_name'])) {
            $error['product_name'] = "Không được để trống !";
        } else {
            $product_name = $_POST['product_name'];
        }

        if (empty($_POST['product_code'])) {
            $error['product_code'] = "Không được để trống !";
        } else {
            $product_code = $_POST['product_code'];
        }

        if (empty($_POST['price'])) {
            $error['price'] = "Không được để trống !";
        } else {
            $price = $_POST['price'];
        }

        if (empty($_POST['desc'])) {
            $error['desc'] = "Không được để trống !";
        } else {
            $desc = $_POST['desc'];
        }

        if (empty($_POST['detail_post'])) {
            $error['detail_post'] = "Không được để trống !";
        } else {
            $detail_post = $_POST['detail_post'];
        }


        if (empty($_POST['parent_id'])) {
            $error['parent_id'] = "Bạn chưa chọn danh mục !";
        } else {
            $parent_id = $_POST['parent_id'];
        }

        if (empty($_POST['status'])) {
            $error['status'] = "Bạn chưa chọn trạng thái !";
        } else {
            $status = $_POST['status'];
        }

        $username = $_SESSION['use_login'];
        /*=====> END VALIDATION FORM <======*/

        $price_old = $_POST['price_old'];
        #>>>>>>>>>>>>> Kiểm tra upload file <<<<<<<<<<<<<<<<<<
        if (empty($_FILES['file']['name'])) {
            $error['file'] = "Yêu cầu chọn file ảnh cần upload !";
        } else {
            $upload_dir = '../uploads/products/';
            $upload_file = $upload_dir . $_FILES['file']['name']; // dich den quan trong nhat 
            //Chuan hoa du lieu file khi upload len
            $type_allow = array('png', 'jpg', 'gift', 'jpeg');
            $file_tail = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            //=======================================
            //XU DUNG THUAT TOAN DAT CO HIEU DE XU LY CHUAN HOA DU LIEU FILE UPLOAD
            //=======================================
            #1. phat co 
            if (!in_array(strtolower($file_tail), $type_allow)) {
                #2. Ha co
                $error['file'] = 'Chi chap nhan file co duoi png, jpg, jpeg, gift';
            } else {
                //Kiem tra size cua file
                if ($_FILES['file']['size'] > 29000000) {
                    $error['file'] = "File upload khong duoc phep vuot qua 20MB";
                }
                //=====================================================
                //kiem tra va xu ly khi trung ten file
                //=====================================================
                if (file_exists($upload_file)) {
                    $old_file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                    //Tao ra ten file moi
                    $new_file_name = $old_file_name . ' - Copy.';
                    $new_upload_file = $upload_dir . $new_file_name . $file_tail;
                    $k = 1;
                    while (file_exists($new_upload_file)) {
                        //=====================================================
                        //Tiep tuc tao ra ten file moi
                        //=====================================================
                        $new_file_name = $old_file_name . " - Copy({$k}).";
                        $k++;
                        $new_upload_file = $upload_dir . $new_file_name . $file_tail;
                    }
                    $upload_file = $new_upload_file;
                }
            }
        }
        if (empty($_FILES['image']['name'])) {
            echo " loi ";
        }
        // $result = "";
        // // Số lượng ảnh upload 
        // $num_images = count($_FILES['file']['name']);
        // $target_dir = "../uploads/product_thumbs/";
        // // Duyệt từng ảnh để upload lên server 
        // for ($i = 0; $i < $num_images; $i++) {
        //     $target_file = $target_dir . basename($_FILES['file']['name'][$i]);

        //     if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
        //         // Tạo html hiển thị hình ảnh đã upload 
        //         $result .= "<img style='width:100px; display:block' src=\"{$target_file}\" >";
        //         //    echo "Upload {$i} ok";
        //     }
        // }
        // echo json_encode($result);
        if (empty($error)) {

            $name = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);

            $data = array(
                'product_code' =>  $product_code,
                'product_name' =>  $product_name,
                'category' => $parent_id,
                'price' =>  $price,
                'status' => $status,
                'content' =>  $detail_post,
                'user_create' =>  $username,
                'create_time' => $create_time,
                'image' => $name,
                'price_old' => $price_old,
                'description' => $desc
            );
            // global $image_thumb;
            // $product_code = $data['product_code'];
            // $product_name = $data['product_name'];
            // add_img_thumb($product_code, $product_name, $image_thumb);
            add_product($data);
            header("Location: ?mod=product&action=index");
        }
    }
    load_view('add');
}

function addThumbAction()
{
    global $image_thumb;
    $result = "";
    // Số lượng ảnh upload 
    $num_images = count($_FILES['file']['name']);
    $target_dir = "../uploads/product_thumbs/";
    // Duyệt từng ảnh để upload lên server 
    for ($i = 0; $i < $num_images; $i++) {
        $target_file = $target_dir . basename($_FILES['file']['name'][$i]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
            // Tạo html hiển thị hình ảnh đã upload 
            $result .= "<img style='width:100px; display:block' src=\"{$target_file}\" >";
        }
    }
    $image_thumb = $_FILES['file']['name'];
    echo json_encode($result);
}

function deleteAction()
{
    $user_remove = $_SESSION['use_login'];
    $date_remove = date('d/m/Y');
    $id = $_GET['id'];
    if (get_product_by_id($id)) {
        $data = array(
            'code_product' => $id,
            'user_remove' => $user_remove,
            'date_remove' => $date_remove
        );
        save_delete_product($data);
        delete_product_by_id($id);
        redirect("?mod=product&action=index");
    }
}

function listAction()
{
    load_view('list');
}

function editAction()
{

    $id = $_GET['id'];
    $create_time = date('d/m/Y');
    global $price_old, $category, $error, $product_name, $product_code, $price, $desc, $detail_post, $file, $status, $parent_id, $username;
    if (isset($_POST['btn_add'])) {
        $error_file = array();
        $error = array();
        if (empty($_POST['product_name'])) {
            $error['product_name'] = "Không được để trống !";
        } else {
            $product_name = $_POST['product_name'];
        }

        if (empty($_POST['product_code'])) {
            $error['product_code'] = "Không được để trống !";
        } else {
            $product_code = $_POST['product_code'];
        }

        if (empty($_POST['price'])) {
            $error['price'] = "Không được để trống !";
        } else {
            $price = $_POST['price'];
        }

        if (empty($_POST['category'])) {
            $error['category'] = "Không được để trống !";
        } else {
            $category = $_POST['category'];
        }
        if (empty($_POST['desc'])) {
            $error['desc'] = "Không được để trống !";
        } else {
            $desc = $_POST['desc'];
        }

        if (empty($_POST['detail_post'])) {
            $error['detail_post'] = "Không được để trống !";
        } else {
            $detail_post = $_POST['detail_post'];
        }
        /*=====> END VALIDATION FORM <======*/


        $price_old = $_POST['price_old'];
        #>>>>>>>>>>>>> Kiểm tra upload file <<<<<<<<<<<<<<<<<<
        // if (empty($_FILES['file']['name'])) {
        //     $error_file['file'] = "Yêu cầu chọn hình ảnh cần upload !";
        // } else {
        $upload_dir = '../uploads/products/';
        $upload_file = $upload_dir . $_FILES['file']['name'];
        //Chuan hoa du lieu file khi upload len
        $type_allow = array('png', 'jpg', 'gift', 'jpeg');
        $file_tail = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        //=======================================
        //XU DUNG THUAT TOAN DAT CO HIEU DE XU LY CHUAN HOA DU LIEU FILE UPLOAD
        //=======================================
        #1. phat co 
        //     if (!in_array(strtolower($file_tail), $type_allow)) {
        //         #2. Ha co
        //         $error_file['file'] = 'Chi chap nhan file co duoi png, jpg, jpeg, gift';
        //     } else {
        //         //Kiem tra size cua file
        //         if ($_FILES['file']['size'] > 29000000) {
        //             $error_file['file'] = "File upload khong duoc phep vuot qua 20MB";
        //         }
        //         //=====================================================
        //         //kiem tra va xu ly khi trung ten file
        //         //=====================================================
        //         if (file_exists($upload_file)) {
        //             $old_file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
        //             //Tao ra ten file moi
        //             $new_file_name = $old_file_name . ' - Copy.';
        //             $new_upload_file = $upload_dir . $new_file_name . $file_tail;
        //             $k = 1;
        //             while (file_exists($new_upload_file)) {
        //                 //=====================================================
        //                 //Tiep tuc tao ra ten file moi
        //                 //=====================================================
        //                 $new_file_name = $old_file_name . " - Copy({$k}).";
        //                 $k++;
        //                 $new_upload_file = $upload_dir . $new_file_name . $file_tail;
        //             }
        //             $upload_file = $new_upload_file;
        //         }
        //     }
        // }
        // Keiems tra
        if (empty($error)) {
            $name = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            $data = array(
                'product_name' =>  $product_name,
                'product_code' =>  $product_code,
                'price' =>  $price,
                'category' => $parent_id,
                'content' =>  $detail_post,
                'category' => $category,
                'image' => $name,
                'description' => $desc,
                'price_old' => $price_old
            );
            update_product($data, $id);
            redirect("?mod=product&action=index");
            $_SESSION['status'] = "ok";
        }
    }
    $list_product = get_list_product_id($id);
    $data['list_product'] = $list_product;

    load_view('edit', $data);
}

function searchAction()
{
    if (isset($_POST['search'])) {
        $name = $_POST['search'];
        $list_product = search_by_text($name);
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
            echo $output;
        }
    }
    if (empty($output)) {
        echo '<div style="width:100%"><p style="text-align:center;">Không tìm thấy !</p></div>';
    }
}
