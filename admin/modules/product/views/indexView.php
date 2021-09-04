<?php

get_header();
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <?php if (isset($_SESSION['status'])) {
                echo '<div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Cập nhật dữ liệu thành công !.</strong> 
                  </div>';
                unset($_SESSION['status']);
            } ?>
            <?php if (isset($_SESSION['status_auth'])) {
                echo '<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Bạn không đủ quyền truy cập danh mục này !.</strong> 
                  </div>';
                unset($_SESSION['status_auth']);
            } ?>
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=product&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=product&action=index&status=active">Tất cả <span class="count">(<?php echo num_row(); ?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=product&action=index&status=posted">Đã đăng <span class="count">(<?php echo num_row(); ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=product&action=index&status=wait">Chờ xét duyệt<span class="count">(0)</span> |</a></li>
                            <li class="pending"><a href="?mod=product&action=index&status=trash">Thùng rác<span class="count">(<?php echo num_delete(); ?>)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="seach" name="seach" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                        <ul id="result" class="dropdown-search">

                        </ul>
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
                    <div id="featured-">
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Mã sản phẩm</span></td>
                                        <td><span class="thead-text">Hình ảnh</span></td>
                                        <td style="width: 400px;"><span class="thead-text">Tên sản phẩm</span></td>
                                        <td><span class="thead-text">Giá</span></td>
                                        <td><span class="thead-text">Danh mục</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                </thead>
                                <tbody id="output">
                                    <?php
                                    $temp = 0;
                                    foreach ($list_product as $item) {
                                        $temp++;
                                    ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                            <td><span class="tbody-text"><?php echo $item['product_code'] ?></h3></span>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="../uploads/products/<?php echo $item['image']; ?>" alt="">
                                                </div>
                                            </td>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $item['product_name'] ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="?mod=product&action=edit&id=<?php echo $item['id'] ?>" data-id-edit="<?php echo $item['id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="?mod=product&action=delete&id=<?php echo $item['id'] ?>" data-id-del="<?php echo $item['id'] ?> title=" Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>

                                            <td><span class="tbody-text"><?php echo currency_format($item['price']) ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['category'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['status'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['user_create'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $item['create_time'] ?></span></td>
                                        </tr>
                                        <?php //} 
                                        ?>
                                    <?php } ?>
                                </tbody>
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
                        <div class="section" id="paging-wp">
                            <div class="section" id="paging-wp">
                                <div class="section-detail clearfix">
                                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                                    <?php
                                    echo get_pagging($num_page, $page, "?mod=product&action=index");
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

?>