<?php get_header();
global $error; ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">

            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <?php
                        foreach ($list_post as $item) {
                        ?>
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" id="title" value="<?php echo $item['title']; ?>">
                            <?php echo form_error('title') ?>
                            <label for="desc">Mô tả</label>
                            <textarea name="desc" id="desc" class="ckeditor"><?php echo $item['description']; ?></textarea>
                            <?php echo form_error('title') ?>

                            <label for="desc">Nội dung bài viết</label>
                            <textarea name="content" id="desc" class="ckeditor"><?php echo $item['content']; ?></textarea>
                            <?php echo form_error('title') ?>
                            <label>Hình ảnh</label>
                            <div id="uploadFile">
                                <input type="file" name="file" id="upload-thumb">
                                <img src="../uploads/post/<?php echo $item['image']; ?>">
                                <?php echo form_error('file'); ?>
                            </div>
                            <label>Danh mục cha</label>
                            <select name="category">
                                <option value="">-- Chọn danh mục --</option>
                                <option <?php if (isset($item['category']) && $item['category'] == 'Điện tử') echo "selected ='selected'" ?> value="Điện tử">Điện tử</option>
                                <option <?php if (isset($item['category']) && $item['category'] == 'Xã hội') echo "selected ='selected'" ?> value="Xã hội">Xã hội</option>
                                <option <?php if (isset($item['category']) && $item['category'] == 'Tài chính') echo "selected ='selected'" ?> value="Tài chính">Tài chính</option>
                            </select>

                        <?php
                        } ?>
                        <button type="submit" name="btn-edit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>