<?php

use Guzzle\Http\Message\Header;

function construct()
{
    load_model('index');
}

function indexAction()
{
}
function loginAction()
{
    global $error;
    global $t;
    if (isset($_POST['btn_login'])) {
        $error = array();
        if (empty($_POST['username'])) {
            $error['username'] = "Không được để trống trường này !";
        } else {
            if (strlen($_POST['username']) < 5) {
                $error['username'] = "Ký tự từ 5-32 !!";
            } else {
                if (!is_username($_POST['username'])) {
                    $error['username'] = "Bao gồm chữ hoa và số";
                } else {
                    $username = $_POST['username'];
                }
            }
        }
        if (empty($_POST['password'])) {
            $error['password'] = "Không được để trống trường này !";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Độ dài tối thiểu 6-32 ký tự ! Bắt đầu bằng chữ in hoa !";
            } else {
                $password = ($_POST['password']);
            }
        }

        if (empty($error)) {
            if (login($username, $password)) {
                // if (isset($_POST['remember_me'])) {
                //     setcookie('is_login', true, time() + 3600);
                //     setcookie('use_login', $username, time() + 3600);
                // }
                $_SESSION['is_login'] = true;
                $_SESSION['use_login'] = $username;
                header("Location: ?");
            } else {
                // if (isset($username) && isset($password))
                $t =  "Sai đăng nhập or mật khẩu";
            }
        }
    }
    load_view('login');
}


function infoAction()
{
    $username = $_SESSION['use_login'];
    $info_user = get_user_by_username($username);
    $data['info_user'] = $info_user;
    load_view('info', $data);
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
                    update_pass($pass_new, $pass_old);
                    $ok = "Đổi mật khẩu thành công !";
                } else {
                    $error['confirm'] = "Mật khẩu mới và nhập lại không trùng !";
                }
            } else {
                $t = "Mật khẩu cũ không chính xác !";
            }
        }
    }
    load_view('pass');
}


function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['use_login']);
    redirect("Location: ?mod=users&action=login");
}
