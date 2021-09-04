<?php
if(isset($_POST['btn-submit'])){
    $error=array();
    if(empty($_POST['detail'])){
        $error['detail']="Không được để trống trường detail";
    }else{
        $detail=$_POST['detail'];
        echo $detail;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <script src="ckeditor/ckeditor.js"></script>

    <title>Document</title>
</head>
<body>
<style>
    #content{
        width:960px;
        margin: 0px auto;
    }

</style>
    <div id="content">
        <form action="" method="post">
            <textarea name="detail" class="ckeditor" id="" ></textarea> <br>
             <input type="submit" value="Send" name="btn-submit">
        </form> 
    </div>

</body>
</html>