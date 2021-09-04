<?php
get_header(); ?>
<div id="main-content-wp" class="info-account-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>


        <style>
            form {
                width: 500px;
            }

            form p {
                float: right;
                color: red;
                font-size: 13px;
            }

            input,
            textarea {
                width: 100% !important;
            }
        </style>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Tạo user</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <?php global $error;
                        ?>
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="fullname" id="display-name">
                        <p><?php if (!empty($error['fullname'])) echo $error['fullname'] ?></p>
                        <label for="display-name">Phân quyền</label>
                        <input style="border:1px solid #e3e3e3;" max="3" min="1" type="number" name="auth" id="auth">
                        <p><?php if (!empty($error['auth'])) echo $error['auth'] ?></p>
                        <label for="username" class="mt-3">Tên đăng nhập</label>
                        <input type="text" name="username" id="usernamee" placeholder="admin">
                        <p><?php if (!empty($error['username'])) echo $error['username'] ?></p>

                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" placeholder="password">
                        <p><?php if (!empty($error['password'])) echo $error['password'] ?></p>

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                        <p><?php if (!empty($error['email'])) echo $error['email'] ?></p>

                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel">
                        <p><?php if (!empty($error['tel'])) echo $error['tel'] ?></p>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"></textarea>
                        <button type="submit" name="btn-reg" id="btn-reg">Đăng ký</button>
                        <span><?php global $t;
                                echo $t ?></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>