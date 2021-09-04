<?php

get_header();
global $fullname;
?>

<div id="content">
    <table>
        <thead>
            <tr>
                <td>STT</td>
                <td>Tên</td>
                <td>Email</td>
                <td>Tuổi</td>
                <td>Thu nhập</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($list_users)) {
                $t = 0;
                foreach ($list_users as $user) {
                    if ($user['fullname'] == "Đặng Dương Anh Tuấn") {
                        $fullname = $user['fullname'];
                    }
                    $t++;

            ?>
                    <tr>
                        <td><?php echo $t; ?></td>
                        <td><?php echo $user['fullname'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['age'] ?></td>
                        <td><?php echo currency_format($user['Money'], '$'); ?></td>
                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
    <?php
    global $fullname;
    echo $fullname;
    ?>
</div>

<?php

get_footer();
?>