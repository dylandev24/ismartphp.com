<?php

get_header();
?>
<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <?php if (isset($_SESSION['slider'])) {
                echo '<div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thêm slider thành công !.</strong> 
                  </div>';
                unset($_SESSION['slider']);
            } ?>
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách slider</h3>
                    <a href="?mod=slider&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(69)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span></a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Tác vụ</span></td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $temp = 0;
                                foreach ($list_slider as $item) {
                                    $temp++; ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                        <td style="width:100px">
                                            <div class="tbody-thumb" style="width:600px;height:auto">
                                                <img src="../uploads/slider/<?php echo $item['image'] ?>" alt="">
                                            </div>
                                        </td>
                                        <td><span id="priority" class="tbody-text"><?php echo $item['priority'] ?></span></td>
                                        <td id="icon"><span><button style="border:none; background:white; cursor:pointer;" class="edit_slider" name="edit" data-id-edit="<?php echo $item['id']; ?>"><a href="?mod=slider&action=edit&id=<?php echo $item['id'] ?>"><i title="Sửa" class="fa fa-edit"></i></a></button>
                                                <button style="border:none; background:white; cursor:pointer;" class="remove" name="remove" data-id="<?php echo $item['id']; ?>"><i title=" Xóa" class="fa fa-minus-square"></i></button></span></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    tbody td {
        line-height: 227px;
    }

    td {
        text-align: center;
    }

    tbody td span {
        font-size: 16px;
    }

    #priority {
        background-color: black;
        padding: 8px 16px;
        border-radius: 7px;
        color: white
    }

    td .fa {
        font-size: 24px;
    }

    td .edit {
        color: #66CCCC;
    }

    td .remove {
        color: red;
    }
</style>
<?php
get_footer();

?>