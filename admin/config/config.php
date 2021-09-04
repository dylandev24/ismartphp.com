<?php

/*
 * ---------------------------------------------------------
 * BASE URL
 * ---------------------------------------------------------
 * Cấu hình đường dẫn gốc của ứng dụng
 * Ví dụ: 
 * http://hocweb123.com đường dẫn chạy online 
 * http://localhost/yourproject.com đường dẫn dự án ở local
 * 
 */
ob_start();
session_start();
$config['base_url'] = "http://localhost:81/project/ismart.com/";


$config['default_module'] = 'product';
$config['default_controller'] = 'index';
$config['default_action'] = 'index';
