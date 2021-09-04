<?php

get_header();
?>
<style>
    table td {
        border: 1px solid #e3e3e3;
        height: 40px !important;
    }


    table tr {
        border: 1px solid #e3e3e3;
    }

    table i {
        font-size: 20px !important;
        margin-right: 8px;
        color: red;
    }
</style>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách trang</h3>
                    <a href="?page=add_page" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo num_row(); ?>)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(5)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt <span class="count">(5)</span> |</a></li>
                            <li class="trash"><a href="">Thùng rác <span class="count">(<?php echo num_row_delete(); ?>)</span></a></li>
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
                                <option value="1">Chỉnh sửa</option>
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
                                    <td><span class="thead-text">Tên trang</span></td>
                                    <td><span class="thead-text">Slug</span></td>
                                    <td><span class="thead-text">Tác vụ</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $temp = 0;
                                foreach ($list_page as $item) {
                                    $temp++;
                                ?>
                                    <tr id="tr-rows">
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td contenteditable><span class="thead-text"><?php echo $temp ?></span></td>
                                        <td contenteditable><span class="thead-text"><?php echo $item['name_page'] ?></span></td>
                                        <td contenteditable><span class="thead-text"><?php echo $item['slug'] ?></span></td>
                                        <td><span><button style="border:none; background:white; cursor:pointer;" class="edit" name="edit" data-id-edit="<?php echo $item['id']; ?>"><i title="Sửa" class="fa fa-edit"></i></i></button>
                                                <button style="border:none; background:white; cursor:pointer;" class="remove" name="remove" data-id="<?php echo $item['id']; ?>"><i title=" Xóa" class="fa fa-minus-square"></i></button></span></td>
                                    </tr>
                            </tbody>
                        <?php } ?>
                        <!-- <tfoot>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="tfoot-text">STT</span></td>
                                <td><span class="tfoot-text">Mã sản phẩm</span></td>
                                <td><span class="tfoot-text">Hình ảnh</span></td>
                                <td><span class="tfoot-text">Tên sản phẩm</span></td>
                                <td><span class="tfoot-text">Giá</span></td>
                                <td><span class="tfoot-text">Danh mục</span></td>
                                <td><span class="tfoot-text">Trạng thái</span></td>
                                <td><span class="tfoot-text">Người tạo</span></td>
                                <td><span class="tfoot-text">Thời gian</span></td>
                            </tr>
                        </tfoot> -->
                        </table>
                    </div>

                </div>
            </div>
            <!-- <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title="">
                                < </a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-right: 700px;">
        <div class="modal-content" style="width:842px; margin-right:700px !important;">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">Cập nhật PAGE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST">
                            <label for="title">Tên trang</label>
                            <input type="text" name="title" class="form-control" id="title" value=<?php echo $item['name_page'] ?>>
                            <?php echo form_error('title') ?>
                            <label for="title">Slug ( Friendly_url )</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="<?php echo $item['slug'] ?>">
                            <?php echo form_error('slug') ?>
                            <label for="desc">Nội dung</label>
                            <textarea name="desc" id="desc" class="ckeditor"><?php echo $item['content']; ?></textarea>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

</div>
<?php
get_footer();

?>