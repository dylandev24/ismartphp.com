<?php
get_header();
?>
<div id="main-content-wp" class="team-account-page">

    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <a href="mod=post&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                    <h3 id="index" class="fl-left">Danh sách thành viên</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <table class="tablee">

                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên hiển thị</th>
                                <th>Tài khoản</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th style="background-color: #fdf6f6;">Quyền quản lý</th>
                                <th>Ngày tạo tài khoản</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $temp = 0;
                            foreach ($list_users as $user) {
                                $temp++; ?>
                                <tr>
                                    <td><?php echo $temp ?></td>
                                    <td><?php echo $user['fullname'] ?></td>
                                    <td><?php echo $user['username'] ?></td>
                                    <td><?php echo $user['email'] ?></td>
                                    <td><?php echo $user['phone_number'] ?></td>
                                    <td><?php echo $user['address'] ?></td>
                                    <td style="background-color: #fdf6f6;"><?php echo $user['auth'] ?></td>
                                    <td><?php echo $user['create_date'] ?></td>
                                </tr>
                        </tbody>
                    <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>