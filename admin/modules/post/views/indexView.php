<?php

get_header();
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <?php if (isset($_SESSION['status'])) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Cập nhật bài viết thành công !.</strong> 
                    </div>';
                        unset($_SESSION['status']);
                    } ?>
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>

                    <a href="?mod=post&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=post&action=index">Tất cả <span class="count"><?php echo row_post(); ?></span></a> |</li>
                            <li class="publish"><a href="?mod=post&action=index">Đã đăng <span class="count">(5)</span></a> |</li>
                            <li class="pending"><a href="?mod=post&action=index">Chờ xét duyệt <span class="count">(5)</span></a></li>
                            <li class="trash"><a href="?mod=post&action=index">Thùng rác <span class="count"></span></a></li>
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
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td style="width:100px"><span class="thead-text">Danh mục</span></td>

                                    <!-- <td><span class="thead-text">Trạng thái</span></td> -->
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $temp = 0;
                                foreach ($list_post as $item) {
                                    $temp++; ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                        <td>
                                            <div class="tbody-thumb">
                                                <img src="../uploads/post/<?php echo $item['image']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                                <a href="?mod=post&action=update&id=<?php echo $item['id'] ?>" title="<?php echo $item['title']; ?>"><?php echo $item['title']; ?></a>
                                            </div>
                                            <ul class="list-operation fl-right">
                                                <li><a href="?mod=post&action=update&id=<?php echo $item['id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                <li><button class="remove_post delete" data-id="<?php echo $item['id']; ?>" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></button></li>
                                            </ul>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $item['category']; ?></span></td>

                                        <td><span class="tbody-text"><?php echo $item['user_create']; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $item['date_create']; ?></span></td>
                                    </tr>
                                <?php }
                                die; ?>

                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Tiêu đề</span></td>
                                    <td><span class="tfoot-text">Danh mục</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Người tạo</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                    <input type="file" name="file" id="upload-thumb">
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title="">
                                << /a>
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
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

?>