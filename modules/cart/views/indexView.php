<?php
get_header();
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="trang-chu.html" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="gio-hang.html" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <?php if (empty($_SESSION['cart']['buy'])) {
                    echo "<p class='alert'>Bạn chưa có sản phẩm nào trong giỏ hàng !</p>";
                } ?>
                <?php if (!empty($_SESSION['cart']['buy'])) { ?>
                    <table class="table">
                        <thead>
                            <tr>

                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td colspan="2">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($list_cart as $item) { ?>
                                <tr>
                                    <td><?php echo $item['code'] ?></td>
                                    <td>
                                        <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['name']) ?>.html" title="" class="thumb">
                                            <img src="uploads/products/<?php echo $item['image'] ?>" alt="<?php echo $item['name'] ?>">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['name']) ?>.html" title="" class="name-product"><?php echo $item['name'] ?></a>
                                    </td>
                                    <td><?php echo currency_format($item['price']) ?></td>
                                    <td>
                                        <input type="number" min="1" max="20" name="num-order" data-id="<?php echo $item['id']; ?>" value="<?php echo $item['qty']; ?>" class="num-order">
                                    </td>
                                    <td id="sub-total-<?php echo $item['id'] ?>">
                                        <?php echo currency_format($item['total_price']); ?>
                                    </td>
                                    <td>
                                        <button title="Xóa" class="del-product" data-id="<?php echo $item['id'] ?>"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span>
                                                <?php if (isset($_SESSION['cart']['info'])) {
                                                    echo currency_format($_SESSION['cart']['info']['total']);
                                                } ?></span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <a href="thanh-toan-san-pham.html" title="" id="checkout-cart">Thanh toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
    <?php } ?>
    <div class="section" id="action-cart-wp">
        <div class="section-detail">
            <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
            <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br />
            <a href="" title="" id="delete-cart">Xóa giỏ hàng</a>
        </div>
    </div>
    </div>
</div>
<?php
get_footer();
?>