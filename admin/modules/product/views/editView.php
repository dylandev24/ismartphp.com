<?php get_header();
global $error, $error_file;
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
                    <h3 id="index" class="fl-left">Cập nhật</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <form id="submitForm" enctype="multipart/form-data" method="POST">
                        <?php foreach ($list_product as $item) { ?>
                            <div class="row">
                                <div class="box-input col-6">
                                    <label for="product-name">Tên sản phẩm</label>
                                    <input type="text" name="product_name" id="product-name" value="<?php echo $item['product_name'] ?>">
                                    <?php echo form_error('product_name'); ?>
                                    <label for="product-code">Mã sản phẩm</label>
                                    <input type="text" name="product_code" id="product-code" value="<?php echo $item['product_code'] ?>">
                                    <?php echo form_error('product_code'); ?>
                                    <label for="price">Giá cũ sản phẩm</label>
                                    <input type="text" name="price_old" id="price" value="<?php echo $item['price_old'] ?>">
                                    <label for="price">Giá mới sản phẩm</label>
                                    <input type="text" name="price" id="price" value="<?php echo $item['price'] ?>">

                                    <?php echo form_error('price'); ?>
                                    <label>Danh mục sản phẩm</label>
                                    <select name="category">
                                        <option value="">-- Chọn danh mục --</option>
                                        <option <?php if (isset($item['category']) && $item['category'] == 'Điện thoại') echo "selected ='selected'" ?> value="Điện thoại">Điện thoại</option>
                                        <option <?php if (isset($item['category']) && $item['category'] == 'Laptop') echo "selected ='selected'" ?> value="Laptop">Laptop</option>
                                    </select>

                                    <?php echo form_error('category'); ?>

                                </div>
                                <div class="box-text" class="col-6">
                                    <label for="desc">Mô tả ngắn</label>
                                    <textarea name="desc" id="desc" class="ckeditor"><?php echo $item['description'] ?>"</textarea>
                                    <?php echo form_error('desc'); ?>
                                </div>
                            </div>

                            <label for="desc">Chi tiết</label>
                            <textarea name="detail_post" id="desc" class="ckeditor"><?php echo $item['content'] ?>"</textarea>
                            <?php echo form_error('detail_post'); ?>
                            <label>Hình ảnh</label>
                            <div id="uploadFile">
                                <input type="file" name="file" id="upload-thumb" value="" src=>
                                <p><?php //echo $error_file['file']; 
                                    ?></p>
                                <div id="image_preview">
                                    <img src="../uploads/products/<?php echo $item['image']; ?>">
                                </div>
                            </div>
                        <?php } ?>
                        <button type="submit" name="btn_add" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>