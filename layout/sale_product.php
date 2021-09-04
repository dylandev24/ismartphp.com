<ul class="list-item">
    <?php
    global $conn;
    $sql = "SELECT * FROM `tbl_product`";
    $list_product = mysqli_query($conn, $sql);
    ?>
    <?php foreach ($list_product as $item) {
        if ($item['category'] == "Điện thoại") { ?>
            <li class="clearfix">
                <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['product_name']) ?>.html" title="" class="thumb fl-left">
                    <img src="uploads/products/<?php echo $item['image'] ?>" alt="">
                </a>
                <div class="info fl-right">
                    <a href="chi-tiet-san-pham-<?php echo $item['id']; ?>/<?php echo make_url($item['product_name']) ?>.html" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                    <div class="price">
                        <span class="new"><?php echo currency_format($item['price']); ?></span>
                        <span class="old"><?php echo currency_format($item['price_old']); ?></span>
                    </div>
                    <a href="?mod=cart&action=add_live&id=<?php echo $item['id']; ?>" title="" class="buy-now">Mua ngay</a>
                </div>
            </li>
        <?php } ?>
    <?php } ?>
</ul>