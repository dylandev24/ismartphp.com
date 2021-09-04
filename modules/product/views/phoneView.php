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
                        <a href="danh-muc/dien-thoai.html" title="">Điện thoại</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right" id="product-iphone">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Điện thoại</h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị <?php echo num_row_phone(); ?> trên <?php echo num_row_phone(); ?> sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select" id="price_prd">
                                    <option value="0">Sắp xếp</option>
                                    <option value="desc">Giá cao xuống thấp</option>
                                    <option value="asc">Giá thấp lên cao</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix filter_data">

                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix pagination_data">
                        <?php
                        //echo get_pagging($num_page, $page, "?mod=product&action=phone");
                        ?>
                    </div>
                </div>
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
                            <a href="danh-muc/dien-thoai.html" class="cat_prd" id="1">Điện thoại</a>
                            <!-- <ul class="sub-menu">
                                <li>
                                    <a href="danh-muc-san-pham/dien-thoai/iphone.html">Iphone</a>
                                </li>
                                <li>
                                    <a href="danh-muc-san-pham/dien-thoai/samsung.html" title="">Samsung</a>
                                </li>
                                <li>
                                    <a href="danh-muc-san-pham/dien-thoai/oppo.html" title="">Oppo</a>
                                </li>
                            </ul> -->
                        </li>
                        <li>
                            <a href="danh-muc/laptop.html" class="cat_prd" id="2">Laptop</a>
                        </li>
                        <li class="disabled">
                            <a href="?page=category_product" title="">Tai nghe</a>
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
                                    <td><select style="padding: 5px;
                                border: 1px solid #e3e3e3;
                                width: 209px;" name="sort_price" id="sort_price">
                                            <option value="0">...Tất cả...</option>
                                            <option value="1">Trên 20.000.000đ</option>
                                            <option value="2">Dưới 20.000.000đ</option>
                                        </select></td>
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
                                        <td style="width: 22px;"><input type="checkbox" onclick="filter_data();" id="<?php echo $item['brand'] ?>" class="brand-selector" value="<?php echo $item['brand'] ?>"></td>
                                        <td><label for="<?php echo $item['brand'] ?>"><?php echo $item['brand'] ?></label></td>
                                    </tr>
                                <?php }
                                ?>
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
    </div>
</div>
<?php
get_footer();

?>