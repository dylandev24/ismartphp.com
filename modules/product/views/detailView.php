<?php get_header(); ?>
<div id="main-toast">
</div>
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="trang-chu.html" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="#" title="">Chi tiết sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <?php foreach ($list_product as $item) { ?>
                <div class="section" id="detail-product-wp">
                    <div class="section-detail clearfix">
                        <div class="thumb-wp fl-left">
                            <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['product_name']) ?>.html" title="" id="main-thumb">
                                <img id="zoom" src="uploads/products/<?php echo $item['image']; ?>" data-zoom-image="uploads/products/<?php echo $item['image']; ?>" />
                            </a>
                            <div id="list-thumb">
                                <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['product_name']) ?>.html" data-image="uploads/products/<?php echo $item['image']; ?>" data-zoom-image="uploads/products/<?php echo $item['image']; ?>">
                                    <img id="zoom" src="uploads/products/<?php echo $item['image']; ?>" />
                                </a>
                                <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['product_name']) ?>.html" data-image="uploads/products/<?php echo $item['image']; ?>" data-zoom-image="uploads/products/<?php echo $item['image']; ?>">
                                    <img id="zoom" src="uploads/products/<?php echo $item['image']; ?>" />
                                </a>
                                <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['product_name']) ?>.html" data-image="uploads/products/<?php echo $item['image']; ?>" data-zoom-image="uploads/products/<?php echo $item['image']; ?>">
                                    <img id="zoom" src="uploads/products/<?php echo $item['image']; ?>" />
                                </a>
                                <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['product_name']) ?>.html" data-image="uploads/products/<?php echo $item['image']; ?>" data-zoom-image="uploads/products/<?php echo $item['image']; ?>">
                                    <img id="zoom" src="uploads/products/<?php echo $item['image']; ?>" />
                                </a>
                                <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['product_name']) ?>.html" data-image="uploads/products/<?php echo $item['image']; ?>" data-zoom-image="uploads/products/<?php echo $item['image']; ?>">
                                    <img id="zoom" src="uploads/products/<?php echo $item['image']; ?>" />
                                </a>
                            </div>
                        </div>

                        <div class="thumb-respon-wp fl-left">
                            <img src="public/images/img-pro-01.png" alt="">
                        </div>
                        <div class="info fl-right">
                            <h3 class="product-name"><?php echo $item['product_name']; ?></h3>
                            <div class="desc">
                                <?php echo $item['description']; ?>
                            </div>
                            <div class="num-product">
                                <span class="title">Sản phẩm: </span>
                                <span class="status">Còn hàng</span>
                            </div>
                            <p class="price"><?php echo currency_format($item['price']); ?></p>
                            <div id="num-order-wp">
                                <button onclick="showError();" title="" id="minus"><i class="fa fa-minus"></i></button>
                                <input type="text" name="num-order" value="1" id="num-order">
                                <button onclick="showSuccess();" href="" title="" id="plus"><i class="fa fa-plus"></i></button>
                            </div>
                            <a href="?mod=cart&action=add_live&id=<?php echo $item['id'] ?>" title="Thêm giỏ hàng" id="add-cart">Thêm giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <div class="section" id="post-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Mô tả sản phẩm</h3>
                    </div>
                    <div class="section-detail" id="img-detail">
                        <?php echo $item['content']; ?>
                    </div>
                </div>
            <?php } ?>
            <div class="section" id="same-category-wp">
                <!-- <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                    
                    </ul>
                </div> -->
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        <li>
                            <a href="danh-muc/dien-thoai.html" title="">Điện thoại</a>

                        </li>
                        <li>
                            <a href="danh-muc/laptop.html" title="">Laptop</a>
                        </li>

                        <li class="disabled">
                            <a href="?page=category_product" title="">Tai nghe</a>
                        </li>

                    </ul>
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
<script src="public/js/toast.js"></script>
<?php get_footer(); ?>