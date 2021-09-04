<?php 
    function get_header(){
        $path_header = "inc/header.php";
        if(file_exists($path_header)){
            require $path_header;
        }
        else{
            echo "Khong ton tai duong dan !!{$path_header}";
        }
    }
    function get_footer(){
        $path_footer = "inc/footer.php";
        if(file_exists($path_footer)){
            require $path_footer;
        }
        else{
            echo "Khong ton tai duong dan !!";
        }
    }
    function get_script(){
        $path_script = "inc/script.php";
        if(file_exists($path_script)){
            require $path_script;
        }
        else{
            echo "Khong ton tai duong dan !!";
        }
    }
