<?php
    /**
     * @var $basket_products;
     * @var $products;
     */
?>

<div class="basket_page">
        <?php foreach($basket_products as $user_basket_product): ?>
            <?php foreach($products as $product): ?>
                <?php if($product->id === $user_basket_product->user_id): ?>
                    <div class="basket_product_card">
                        <a href="/products/view?id=<?= $product->id ?>">
                            <div class="b-c-img"></div>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
</div>

