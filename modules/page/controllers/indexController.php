<?php

function construct()
{
    load('helper', 'format');
    load_model('index');
}

function indexAction()
{
    $list_blog = get_list_post();
    $data['list_blog'] = $list_blog;
    load_view('blog', $data);
}

function blogAction()
{
    load_view('blog');
}
function introAction()
{
    load_view('intro');
}
function contactAction()
{
    load_view('contact');
}
