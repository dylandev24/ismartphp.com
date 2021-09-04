<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
}

function menuAction()
{
    load_view('menu');
}

function addAction()
{
    load_view('add');
}

function listAction()
{
    load_view('list');
}
