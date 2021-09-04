<?php get_header();
?>
<div id="main-content-wp" class="change-pass-page">

    <div class="wrap clearfix">
        <?php get_sidebar(); ?>

        <style>
            p {
                color: red;
                margin-left: 200px;
            }
        </style>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">

                    <h3 id="index" class="fl-left">Đổi mật khẩu</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <?php global $error, $t, $ok;
                        ?>
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="pass-old" id="pass-old" value="">
                        <p><?php if (!empty($error['pass_old'])) echo $error['pass_old'] ?></p>
                        <p><?php if (empty(($error['pass_old']))) echo $t ?></p>

                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="pass-new" id="pass-new">
                        <p><?php if (!empty($error['pass_new'])) echo $error['pass_new'] ?></p>
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm-pass" id="confirm-pass">
                        <p><?php if (!empty($error['confirm'])) echo $error['confirm']; ?></p>
                        <button type="submit" name="btn_pass" id="btn-submit">Cập nhật</button>
                        <span><?php if (empty($error['confirm'])) echo $ok; ?></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>