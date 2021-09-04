<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <?php foreach ($list_slider as $item) { ?>
                            <label for="title">Tên slider</label>
                            <input type="text" name="title" id="title" value="<?php echo $item['name_slider'] ?>">
                            <?php echo form_error('title') ?>
                            <label for="">Số thứ tự</label>
                            <select name="num_slider" id="">
                                <option>...Chọn độ ưu tiên...</option>
                                <option value="1" <?php if (isset($item['priority']) && $item['priority'] == '1') echo "selected ='selected'" ?>>1</option>
                                <option value="2" <?php if (isset($item['priority']) && $item['priority'] == '2') echo "selected ='selected'" ?>>2</option>
                                <option value="3" <?php if (isset($item['priority']) && $item['priority'] == '3') echo "selected ='selected'" ?>>3</option>
                                <option value="4" <?php if (isset($item['priority']) && $item['priority'] == '4') echo "selected ='selected'" ?>>4</option>
                                <option value="5" <?php if (isset($item['priority']) && $item['priority'] == '5') echo "selected ='selected'" ?>>5</option>
                            </select>
                            <?php echo form_error('num_slider') ?>
                            <label>Hình ảnh</label>
                            <div id="uploadFile">
                                <input type="file" name="file" id="images" multiple="">
                                <?php echo form_error('file') ?>
                                <img style="width:500px;height:auto;" src="../uploads/slider/<?php echo $item['image'] ?>">
                            </div>
                            <button type="submit" name="btn_add_silder" id="btn-submit">Cập nhật</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>