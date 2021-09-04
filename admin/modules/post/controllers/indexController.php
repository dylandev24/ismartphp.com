<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    $list_post = get_list_post();
    $data['list_post'] = $list_post;
    load_view('index', $data);
}

function addAction()
{
    $date_create = date('d/m/Y');
    global $title, $error, $category, $content, $desc;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (empty($_POST['title'])) {
            $error['title'] = "Không được để trống trường này !";
        } else {
            $title = $_POST['title'];
        }

        if (empty($_POST['category'])) {
            $error['category'] = "Không được để trống trường này !";
        } else {
            $category = $_POST['category'];
        }

        if (empty($_POST['content'])) {
            $error['content'] = "Không được để trống trường này !";
        } else {
            $content = $_POST['content'];
        }

        if (empty($_POST['desc'])) {
            $error['desc'] = "Không được để trống trường này !";
        } else {
            $desc = $_POST['desc'];
        }

        // ============================================
        #================ KIỂM TRA FILE =================
        //===========================================
        if (empty($_FILES['file']['name'])) {
            $error['file'] = "Yêu cầu chọn file ảnh cần upload !";
        } else {
            $upload_dir = '../uploads/post/';
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
        if (empty($error)) {
            $image = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            $data = array(
                'title' =>  $title,
                'category' => $category,
                'content' =>  $content,
                'description' => $desc,
                'date_create' => $date_create,
                'image' => $image,
                'user_create' => $_SESSION['use_login']
            );
            add_post($data);
            $_SESSION['status'] = "ok";
            redirect("?mod=post");
        }
    }
    load_view('add');
}
function deleteAction()
{
    // $id = $_GET['id'];
    // if (get_page_by_id($id)) {
    $date_remove = date('d/m/Y');
    $user_remove = $_SESSION['use_login'];
    $id = $_POST['id'];
    delete_post_by_id($id);
}
function listAction()
{
    load_view('list');
}

function updateAction()
{
    $id = $_GET['id'];
    $list_post = get_post_by_id($id);
    $data_post['list_post'] = $list_post;
    if (isset($_POST['btn-edit'])) {
        $title = $_POST['title'];
        $description = $_POST['desc'];
        $content = $_POST['content'];
        $data = array(
            'title' => $title,
            'description' => $description,
            'content' => $content,
        );
        $_SESSION['status'] = "update post";
        update_post($data, $id);
        redirect("?mod=post");
    }
    load_view('edit', $data_post);
}
