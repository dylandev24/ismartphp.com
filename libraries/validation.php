<?php
function is_username($username)
{
    $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($partten, $_POST['username'], $matches))
        return false;
    return true;
}
function is_password($password)
{
    $partten = "/^([A-Z]){1}([\w_\.!@#%^&*()]+){5,31}$/";
    if (!preg_match($partten, $_POST['password'], $matches))
        return false;
    return true;
}

function is_tel($phone_number)
{
    $partten = "/^(09|08|01|03[2|6|8|9])([0-9]{7})$/";
    if (!preg_match($partten, $_POST['phone'], $matches))
        return FALSE;
    return true;
}
function is_email($email)
{
    // $partten = "/^[\w_.]{6,32}@([\w]{2,12})(.[a-zA-Z]{2,12})+$/";
    $partten = "/^[\w_.]{6,32}@([\w]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (!preg_match($partten, $_POST['email'], $matches))
        return FALSE;
    return true;
}

// ==============================================================
// ==============================================================
// ==============================================================
// ==============================================================

function set_value($label_field)
{
    global $$label_field;
    if (!empty($$label_field)) return $$label_field;
}
//form_error
function form_error($label_field)
{
    global $error;
    if (!empty($error[$label_field])) return "<p style=color:red; class = 'error'>{$error[$label_field]}</p>";
}
