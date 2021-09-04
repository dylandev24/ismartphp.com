<?php
get_header();
global $error;
?>

<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                <form method="POST" action="" name="form-checkout">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname" value="<?php echo set_value("fullname") ?>">
                            <?php echo form_error('fullname'); ?>
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo set_value("email") ?>">
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" value="<?php echo set_value("address") ?>">
                            <?php echo form_error('address'); ?>
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" maxlength="10" name="phone" id="phone" value="<?php echo set_value("phone") ?>">
                            <?php echo form_error('phone'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note"></textarea>
                            <?php echo form_error('note'); ?>
                        </div>
                    </div>

            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <?php foreach ($_SESSION['cart']['buy'] as $item) { ?>
                        <tbody>
                            <tr class="cart-item">
                                <td class="product-name">
                                    <a href="" style="width: 50px; float:left;margin-right:20px">
                                        <image src="uploads/products/<?php echo $item['image'] ?>"></image>
                                    </a>
                                    <?php echo $item['name'] ?><strong class="product-quantity">x<?php echo $item['qty'] ?></strong>
                                </td>
                                <td class="product-total"><?php echo currency_format($item['total_price']) ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price"><?php echo currency_format($_SESSION['cart']['info']['total']) ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div id="payment-checkout-wp">
                    <ul id="payment_methods">
                        <li>
                            <input type="radio" id="direct-payment" name="payment" value="Thanh toán bằng thẻ">
                            <label for="direct-payment">Thanh toán bằng thẻ</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-home" name="payment" value="Thanh toán tại nhà">
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                    </ul>
                    <?php echo form_error('payment'); ?>
                </div>

                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" name="btn_order" value="Đặt hàng">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
?>