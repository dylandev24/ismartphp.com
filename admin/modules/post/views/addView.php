<?php get_header();
global $error; ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?php echo set_value('title') ?>">
                        <?php echo form_error('title') ?>
                        <label for="desc">Mô tả</label>
                        <textarea name="desc" id="desc" class="ckeditor" value="<?php echo set_value('desc') ?>"></textarea>
                        <?php echo form_error('title') ?>

                        <label for=" desc">Nội dung bài viết</label>
                        <textarea name="content" id="desc" class="ckeditor" value="<?php echo set_value('content') ?>"></textarea>
                        <?php echo form_error('title') ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <img src="public/images/img-thumb.png">
                            <?php echo form_error('file'); ?>
                        </div>
                        <label>Danh mục cha</label>
                        <select name="category">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="Điện tử">Điện tử</option>
                            <option value="Xã hội">Xã hội</option>
                            <option value="Tài chính">Tài chính</option>
                        </select>

                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>