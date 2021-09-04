<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    $list_slider = get_list_slider();
    $data['list_slider'] = $list_slider;
    load_view('index', $data);
}

function addAction()
{
    global $error, $title, $num_slider;
    if (isset($_POST['btn_add_silder'])) {
        $error = array();
        if (empty($_POST['title'])) {
            $error['title'] = "Không được bỏ trống tiêu đề slider";
        } else {
            $title = $_POST['title'];
        }

        if (empty($_POST['num_slider'])) {
            $error['num_slider'] = "Vui lòng chọn STT";
        } else {
            $num_slider = $_POST['num_slider'];
        }

        if (empty($_FILES['file'])) {
            $error['file'] = "Yêu cầu chọn file ảnh cần upload !";
        } else {
            $upload_dir = '../uploads/slider/';
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
            $name = $_FILES['file']['name'];
            $path = $_FILES['file']['tmp_name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            $data = array(
                'image' => $name,
                'path' => $path,
                'priority' => $num_slider,
                'name_slider' => $title
            );
            if (add_slider($data)) {
                $_SESSION['slider'] = 'ok';
                redirect('?mod=slider');
            }
        }
    }
    load_view('add');
}

function editAction()
{
    $id = $_GET['id'];
    $list_slider = get_list_slider_id($id);
    $data['list_slider'] = $list_slider;
    load_view('edit', $data);
}
