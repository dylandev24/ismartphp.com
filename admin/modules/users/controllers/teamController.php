<?php
function construct()
{
    load_model('index');
}


function createUserAction()
{
    global $t, $error, $fullname, $username, $password, $email, $tel, $address;
    if (get_user_by_auth($_SESSION['use_login'])) {
        if (isset($_POST['btn-reg'])) {
            $error = array();
            if (empty($_POST['fullname'])) {
                $error['fullname'] = "Không được bỏ trống !";
            } else {
                $fullname = $_POST['fullname'];
            }

            if (empty($_POST['username'])) {
                $error['username'] = "Không được bỏ trống !";
            } else {
                $username = $_POST['username'];
            }

            if (empty($_POST['password'])) {
                $error['password'] = "Không được bỏ trống !";
            } else {
                $password = $_POST['password'];
            }

            if (empty($_POST['email'])) {
                $error['email'] = "Không được bỏ trống !";
            } else {
                $email = $_POST['email'];
            }

            if (empty($_POST['tel'])) {
                $error['tel'] = "Không được bỏ trống !";
            } else {
                $tel = $_POST['tel'];
            }
            if (empty($_POST['auth'])) {
                $error['auth'] = "Không được bỏ trống phân quyền !";
            } else {
                $auth = $_POST['auth'];
            }
            $address = $_POST['address'];

            $create_date = date("d/m/Y");


            if (empty($error)) {
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password,
                    'create_date' => $create_date,
                    'email' => $email,
                    'phone_number' => $tel,
                    'auth' => $auth,
                    'create_user' => $_SESSION['use_login'],
                    'address' => $address,
                );
                create_user($data);
                $t = "Đăng ký thành công !";
            }
        }
    } else {
        $_SESSION['status_auth'] = 1;
        redirect("?mod=product");
    }
    load_view('createUser');
}


function indexAction()
{
    if (get_user_by_auth($_SESSION['use_login'])) {
        load('helper', 'format');
        $list_users = get_list_users();
        $data['list_users'] = $list_users;
    } else {
        $_SESSION['status_auth'] = 1;
        redirect("?mod=product");
    }
    load_view('index', $data);
}

function passAction()
{
    global $ok, $t, $pass_old, $pass_new, $pass_confirm, $error, $username;
    if (isset($_POST['btn_pass'])) {
        $error = array();
        if (empty($_POST['pass-old'])) {
            $error['pass_old'] = "Không được bỏ trống !";
        } else {
            $pass_old = $_POST['pass-old'];
        }
        if (!empty($_POST['pass-new'])) {
            $pass_new = $_POST['pass-new'];
        } else {
            $error['pass_new'] = "Không được bỏ trống !";
        }
        if (!empty($_POST['confirm-pass'])) {
            $pass_confirm = $_POST['confirm-pass'];
        } else {
            $error['pass_confirm'] = "Không được bỏ trống !";
        }

        if (empty($error)) {
            if (check_pass($pass_old)) {
                if ($pass_new == $pass_confirm) {
                    update_pass($pass_new, $username);
                    $ok = "Thành công !";
                } else {
                    $error['confirm'] = "mật khẩu mới và nhập lại không trùng !";
                }
            }
        } else {
            $t = "Mật khẩu cũ không chính xác !";
        }
    }
    load_view('passTeam');
}
