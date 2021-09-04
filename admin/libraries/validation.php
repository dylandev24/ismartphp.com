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
