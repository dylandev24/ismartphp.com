<?php get_header();
global $error, $result;
?>
<div id="main-content-wp" class="add-cat-page">
    <style>
        p {
            color: red;
        }
    </style>
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form id="upload_multi" action="" enctype="multipart/form-data" method="post">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name">
                        <?php echo form_error('product_name'); ?>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product-code" value="">
                        <?php echo form_error('product_code'); ?>
                        <label for="price">Giá cũ sản phẩm</label>
                        <input type="text" name="price_old" id="price">
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price">
                        <?php echo form_error('price'); ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc" class="ckeditor"></textarea>
                        <?php echo form_error('desc'); ?>
                        <label for="desc">Chi tiết</label>
                        <textarea name="detail_post" id="desc" class="ckeditor"></textarea>
                        <?php echo form_error('detail_post'); ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <input type="submit" name="btn_upload" value="Upload" id="btn-upload-thumb">
                            <img src="public/images/img-thumb.png">
                        </div>
                        <label>Hình ảnh chi tiet</label>
                        <div id="uploadFileThumb">
                            <input type="file" name="images" id="images" multiple="">
                            <input type="submit" id="bt_upload" name="bt_upload" value="Hien thi">
                            <?php //show_array($_FILES['images']) 
                            ?>
                        </div>
                        <div style="display: flex;min-height:100px;padding:8px;min-width:200px;" id="result"></div>
                        <label>Danh mục sản phẩm</label>
                        <select name="parent_id">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="Điện thoại">Điện thoại</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Phụ kiện">Phụ kiện</option>
                        </select>
                        <?php echo form_error('parent_id'); ?>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="0">-- Chọn danh mục --</option>
                            <option value="Chờ duyệt">Chờ duyệt</option>
                            <option value="Đã đăng">Đã đăng</option>
                        </select>
                        <?php echo form_error('status'); ?>
                        <button type="submit" name="btn_add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>