<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";

}

function indexAction()
{
    load_view('index');
}

function addAction()
{
}

function updateAction()
{
    $id = $_GET['id'];
    echo $id;
}
