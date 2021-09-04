<?php
function get_list_users()
{
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}

function get_user_by_username($username)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    if (!empty($item)) {
        return $item;
    }
}

function get_user_by_auth($username)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `auth` = '1'");
    if (!empty($item)) {
        return $item;
    }
}
function login($username, $password)
{
    $sql = db_num_rows("SELECT * FROM `tbl_users` WHERE `username`='" . $username . "' AND `password` = '" . $password . "'");
    // $result = mysqli_query($conn, $sql);

    if ($sql > 0)
        return true;
    return false;
}

function create_user($data)
{
    return db_insert('tbl_users', $data);
}

function check_pass($pass_old)
{
    $check_pass = db_num_rows("SELECT * FROM `tbl_users` WHERE `password` = '$pass_old'");
    if ($check_pass > 0) {
        return true;
    }
    return false;
}


function update_pass($pass_new, $pass_old)
{
    global $conn;
    $sql = "UPDATE `tbl_users` SET `password` = '$pass_new' WHERE `password` = '$pass_old'";
    $t = mysqli_query($conn, $sql);
    if ($t > 0)
        return true;
    return false;
}

function update_info($fullname, $email, $tel, $address, $username)
{
    global $conn;
    $sql = "UPDATE `tbl_users` SET `fullname` = '$fullname',`email` = '$email',`telephone` = '$tel', `address` = '$address' WHERE `username` = '$username'";
    $t = mysqli_query($conn, $sql);
    if ($t > 0) {
        return true;
    }
    return false;
}
