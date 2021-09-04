<?php get_header(); ?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="trang-chu.html" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="danh-sach-bai-viet.html" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach ($list_blog as $item) { ?>
                            <li class="clearfix" id="post-css">
                                <a href="chi-tiet-bai-viet-<?php echo $item['id'] ?>/<?php echo make_url($item['title']) ?>.html" title="" class="thumb fl-left">
                                    <img id="img-post" src="uploads/post/<?php echo $item['image']; ?>" alt="">
                                </a>
                                <div class="info fl-right" id="post_post">
                                    <a href="chi-tiet-bai-viet-<?php echo $item['id'] ?>/<?php echo make_url($item['title']) ?>.html" title="" class="title"><?php echo $item['title'] ?></a>
                                    <span class="create-date"><?php echo $item['date_create'] ?></span>
                                    <p class=" desc"><a href="chi-tiet-bai-viet-<?php echo $item['id'] ?>/<?php echo make_url($item['title']) ?>.html"><?php echo $item['description']; ?></a></p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <?php get_sale_product() ?>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_blog_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>