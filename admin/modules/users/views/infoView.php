<?php
get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <?php get_sidebar(); ?>
        <style>
            p {
                color: red;
            }
        </style>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <?php global $error, $t; ?>
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="fullname" id="display-name" value="<?php if (!empty($info_user['fullname'])) echo $info_user['fullname'] ?>">

                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" value="<?php if (!empty($info_user['username'])) echo $info_user['username'] ?>" readonly=" readonly">


                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php if (!empty($info_user['email'])) echo $info_user['email'] ?>" readonly=" readonly">


                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="<?php if (!empty($info_user['phone_number'])) echo $info_user['phone_number'] ?>">


                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php if (!empty($info_user['address'])) echo $info_user['address'] ?></textarea>


                        <button type="submit" name="btn-update" id="btn-update">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>