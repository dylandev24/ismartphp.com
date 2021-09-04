<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{
    load('lib', 'sendmail');
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    global $error, $fullname, $email, $address, $phone, $note, $payment;
    if (isset($_POST['btn_order'])) {
        $error = array();
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Không được bỏ trống trường này !";
        } else {
            htmlspecialchars($fullname = $_POST['fullname']);
        }

        if (empty($_POST['email'])) {
            $error['email'] = "Không được bỏ trống trường này !";
        } else {
            if (is_email($email) == false) {
                $error['email'] = "Bạn cần nhập đúng định dạng email (vd: xxx@gmail.com)";
            } else {
                htmlspecialchars($email = $_POST['email']);
            }
        }

        if (empty($_POST['address'])) {
            $error['address'] = "Không được bỏ trống trường này !";
        } else {
            htmlspecialchars($address = $_POST['address']);
        }

        if (empty($_POST['phone'])) {
            $error['phone'] = "Không được bỏ trống trường này !";
        } else {
            if (is_tel($phone) == false) {
                $error['phone'] = "Số điện thoại chưa đúng định dạng !";
            } else {
                htmlspecialchars($phone = $_POST['phone']);
            }
        }

        if (empty($_POST['payment'])) {
            $error['payment '] = "Vui lòng chọn hình thức thanh toán !";
        } else {
            $payment = $_POST['payment'];
        }
        $note = $_POST['note'];
        $date = date("d/m/Y- G:i a");
        if (empty($error)) {
            foreach ($_SESSION['cart']['buy'] as $item) {
                $data = array(
                    'code_order' => $item['code'],
                    'fullname' => $fullname,
                    'email' => $email,
                    'address' => $address,
                    'phone_number' => $phone,
                    'note' => $note,
                    'image' => $item['image'],
                    'product_name' => $item['name'],
                    'quantity' => $item['qty'],
                    'price' => $item['price'],
                    'total_price' => $item['total_price'],
                    'payment' => $payment,
                    'date_order' => $date
                );
                send_mail($email, $fullname, "Xác nhận đơn hàng", "Bạn đã mua hàng thành công");
                order($data);
            }
            unset($_SESSION['cart']);
            redirect('dat-hang-thanh-cong.html');
        } else {
        }
    }
    load_view('index');
}

function addAction()
{
    echo "Thêm dữ liệu";
}

function thanksAction()
{
    load_view('thanks');
}
