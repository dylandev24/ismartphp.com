<?php
function check_login($username, $password)
{
    global $list_user;

    foreach ($list_user as $item) {
        if (($username == $item['username']) && (md5($password) == $item['password'])) {
            return true;
        }
    }
    return false;
}
function is_login()
{
    if (isset($_SESSION['is_login'])) {
        return true;
    }
    return false;
}

// trả về username của user 
function user_login()
{
    if (!empty($_SESSION['use_login'])) {
        return $_SESSION['use_login'];
    }
    return false;
}
function info_user($username, $fullname)
{
    // global $list_users;
    // if (isset($_SESSION['is_login'])) {
    //     foreach ($list_users as $user) {
    //         if ($username == $user['username']) {
    //             if (array_key_exists($field, $user)) {
    //                 return $user[$field];
    //             }
    //         }
    //     }
    // }
    // return false;
    global $fullname;
    global $conn;
    $sql = "SELECT * FROM `tbl_users` WHERE `username`='" . $username . "' AND `fullname` = '" . $fullname . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo $fullname;
    }
}
