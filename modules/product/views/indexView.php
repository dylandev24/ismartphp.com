<?php

get_header();
?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home&action=index" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=product&action=index" title="">Sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right" id="product-iphone">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Điện thoại</h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị <?php echo num_row(); ?> trên <?php echo num_row(); ?> sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="3">Giá thấp lên cao</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item filter_data clearfix">
                        <?php foreach ($list_product as $item) {
                            if ($item['category'] == "Điện thoại") {
                        ?>
                                <li>
                                    <a href="?mod=product&action=detail&id=<?php echo $item['id']; ?>" title="" class="thumb">
                                        <img id="product_img" src="uploads/products/<?php echo $item['image']; ?>">
                                    </a>
                                    <a href="?mod=product&action=detail" title="" class="product-name"><?php echo $item['product_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['price']) ?></php></span>
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
        </div>
        <hr />

        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        <li>
                            <a href="?mod=product&action=phone" title="">Điện thoại</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="danh-muc/dien-thoai/<?php echo $_GET['cat_name'] ?>.html" title="">Iphone</a>
                                </li>
                                <li>
                                    <a href="?mod=product&action=phone&cat_name=samsung" title="">Samsung</a>
                                </li>
                                <li>
                                    <a href="?mod=product&action=phone&cat_name=oppo" title="">Oppo</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="?mod=product&action=laptop" title="">Laptop</a>
                        </li>
                        <li class="disabled">
                            <a href="?page=category_product" title="" disabled="disabled">Máy tính bảng</a>
                        </li>
                        <li class="disabled">
                            <a href="?page=category_product" title="">Tai nghe</a>
                        </li>
                        <li class="disabled">
                            <a href="?page=category_product" title="">Thời trang</a>
                        </li>
                        <li class="disabled">
                            <a href="?page=category_product" title="">Đồ gia dụng</a>
                        </li>
                        <li class="disabled">
                            <a href="?page=category_product" title="">Thiết bị văn phòng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="POST" action="">
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Giá</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Dưới 500.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>500.000đ - 1.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>1.000.000đ - 5.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>5.000.000đ - 10.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Trên 10.000.000đ</td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Hãng</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_brand as $item) {
                                ?>
                                    <tr>
                                        <td style="width: 22px;"><input type="checkbox" onclick="filter_data();" id="<?php echo $item['brand'] ?>" name="brand" class="brand-selector" value="<?php echo $item['brand'] ?>"></td>
                                        <td><label for="<?php echo $item['brand'] ?>"><?php echo $item['brand'] ?></label></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Loại</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Điện thoại</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Laptop</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
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
        <!-- ========================================== -->
        <!-- =========----------LAPTOP----------------- -->
        <!-- ========================================== -->

        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Laptop</h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị 8 trên 16 sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="3">Giá thấp lên cao</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach ($list_product as $item) {
                            if ($item['category'] == "Laptop") { ?>
                                <li>
                                    <a href="?mod=product&action=detail&id=<?php echo $item['id']; ?>" title="" class="thumb">
                                        <img src="uploads/products/<?php echo $item['image']; ?>">
                                    </a>
                                    <a href="?mod=product&action=detail" title="" class="product-name"><?php echo $item['product_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['price']) ?></php></span>
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

            <div class="section" id="paging-wp">
                <div class="section-detail">

                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

?>