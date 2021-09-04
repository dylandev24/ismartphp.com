<?php get_header();
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <?php foreach ($list_slider as $item) {
                    ?>
                        <div class="item">
                            <img src="uploads/slider/<?php echo $item['image']; ?>" alt="">
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach ($list_product as $hightlight) { ?>
                            <li>
                                <a href="chi-tiet-san-pham-<?php echo $hightlight['id']; ?>/<?php echo make_url($hightlight['product_name']) ?>.html" title="" class="thumb">
                                    <img src="uploads/products/<?php echo $hightlight['image']; ?>">
                                </a>
                                <a href="?mod=product&action=detail&id=<?php echo $hightlight['id']; ?>" title="" class="product-name"><?php echo $hightlight['product_name']; ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($hightlight['price'], "đ"); ?></span>
                                    <span class="old"><?php echo currency_format($hightlight['price_old'], "đ"); ?></span>
                                </div>
                                <div class="action clearfix">
                                    <button id="add-to-cart" data-id-product="<?php echo $hightlight['id']; ?>" title="Thêm vào giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</button>
                                    <a href="?mod=cart&action=add_live&id=<?php echo $hightlight['id'] ?>" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail" id="show-home-product">
                    <ul class="list-item clearfix">
                        <?php foreach ($list_product as $item) {
                            if ($item['category'] == "Điện thoại") { ?>
                                <li>
                                    <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['product_name']) ?>.html" title="" class="thumb">
                                        <img src="uploads/products/<?php echo $item['image']; ?>">
                                    </a>
                                    <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['product_name']) ?>.html" title="" class="product-name"><?php echo $item['product_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['price']); ?></span>
                                        <span class="old"><?php echo currency_format($item['price_old']); ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <button id="add-to-cart" data-id-product="<?php echo $item['id']; ?>" title="Thêm vào giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</button>
                                        <a href="?mod=cart&action=add_live&id=<?php echo $item['id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Laptop</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach ($list_product as $item) {
                            if ($item['category'] == "Laptop") { ?>
                                <li>
                                    <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['product_name']) ?>.html" title="" class="thumb">
                                        <img src="uploads/products/<?php echo $item['image']; ?>">
                                    </a>
                                    <a href="?mod=product&action=detail" title="" class="product-name"><?php echo $item['product_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['price']) ?></span>
                                        <span class="old"><?php echo currency_format($item['price_old']) ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <button id="add-to-cart" data-id-product="<?php echo $item['id']; ?>" title="Thêm vào giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</button>
                                        <a href="?mod=cart&action=add_live" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <?php get_sidebar(); ?>
            <?php get_sale_product();
            ?>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="#" title="" class="thumb">
                <img src="public/images/banner.png" alt="">
            </a>
        </div>
    </div>
</div>
</div>
</div>
<?php get_footer(); ?>