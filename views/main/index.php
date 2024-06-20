<?php
use kv4nt\owlcarousel\OwlCarouselWidget;


/**
 * @var $sneakers;
 * @var $categories;
 * @var $shirts;
 * @var $slippers;
 * @var $caps
 */
?>

<div class="main-page">
    <div class="banner">
        <?php
            OwlCarouselWidget::begin([
                'container' => 'div',
                'containerOptions' => [
                    'id' => 'container-id',
                    'class' => 'container-class'
                ],
                'pluginOptions'    => [
                    'autoplay'          => true,
                    'autoplayTimeout'   => 5000,
                    'items'             => 1,
                    'loop'              => true,
                    'itemsDesktop'      => [893, 3],
                    'itemsDesktopSmall' => [893, 3]
                ]
            ]);
        ?>

        <div class="item-class"><img src="/img/banner1.png" alt="Image 1"></div>
        <div class="item-class"><img src="/img/banner2.png" alt="Image 2"></div>
        <div class="item-class"><img src="/img/banner3.png" alt="Image 3"></div>


        <?php OwlCarouselWidget::end(); ?>
        <div class="mini-banners">
            <a href="/catalog/view?id=21" class="m-b-item">
                <img src="/img/mini_banner1.png" alt="">
                <span>Летние кроссовки →</span>
            </a>
            <a href="/catalog/" class="m-b-item">
                <img src="/img/mini_banner2.png" alt="">
                <span>Выгодное предложение →</span>
            </a>  
        </div>
    </div>


    <div class="products-row ">
        <h2 class='p-r-title'>Кроссовки</h2>
        <div class="row row-cols-4 gap-3">
            <?php foreach($sneakers as $product): ?>
                    <div class="product-card">
                        <a href='/products/view?id=<?= $product->id ?>' class="card-body">
                            <div class="card-img"><img src="/products_img/<?= $product->img ?>" alt=""></div>
                            <div class="card-content">
                                <h5 class="card-price card-price<?= $product->id; ?>">
                                <script>
                                    "use script" 
                                    let cardPrices<?= $product->id; ?> = document.getElementsByClassName("card-price");
                                    for(let i = 0; i < cardPrices<?= $product->id; ?>.lenght; i++){
                                        let cardPrice<?= $product->id; ?> = cardPrices<?= $product->id; ?>[i]
                                        console.log(cardPrice<?= $product->id; ?>)

                                        let number<?= $product->id; ?> = [<?= $product->price; ?>];
                                        const pricesStr<?= $product->id; ?> = number.toLocaleString(
                                            'ru-RU', {style: 'currency', currency: "RUB"}
                                        )

                                        cardPrice<?= $product->id; ?>.textContent = pricesStr<?= $product->id; ?>
                                    }
                                </script>
                                </h5>
                                <span class='card-title'><?= $product->title ?></span>
                            </div>
                        </a>
                        <a href="/cart/add?user_id=<?=Yii::$app->user->id;?>&product_id=<?=$product->id ?>" class="btn card-btn" style='border-radius: 5px'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill='white' width="24" height="24" viewBox="0 0 24 24"> <path d="M5.50835165,12.5914912 C5.5072855,12.5857255 5.50631828,12.5799252 5.5054518,12.5740921 L4.28533671,5.25340152 C4.16478972,4.53011956 3.53900455,4 2.80574582,4 L2.5,4 C2.22385763,4 2,3.77614237 2,3.5 C2,3.22385763 2.22385763,3 2.5,3 L2.80574582,3 C3.99756372,3 5.0190253,3.84029234 5.25525588,5 L21.5,5 C21.8321894,5 22.0720214,5.31795246 21.980762,5.63736056 L19.980762,12.6373606 C19.9194332,12.8520113 19.7232402,13 19.5,13 L6.59023021,13 L6.71466329,13.7465985 C6.83521028,14.4698804 7.46099545,15 8.19425418,15 L19.5,15 C19.7761424,15 20,15.2238576 20,15.5 C20,15.7761424 19.7761424,16 19.5,16 L8.19425418,16 C6.97215629,16 5.92918102,15.1164674 5.72826937,13.9109975 L5.5083519,12.5914927 L5.50835165,12.5914912 Z M5.42356354,6 L6.42356354,12 L19.1228493,12 L20.837135,6 L5.42356354,6 Z M8,21 C6.8954305,21 6,20.1045695 6,19 C6,17.8954305 6.8954305,17 8,17 C9.1045695,17 10,17.8954305 10,19 C10,20.1045695 9.1045695,21 8,21 Z M8,20 C8.55228475,20 9,19.5522847 9,19 C9,18.4477153 8.55228475,18 8,18 C7.44771525,18 7,18.4477153 7,19 C7,19.5522847 7.44771525,20 8,20 Z M17,21 C15.8954305,21 15,20.1045695 15,19 C15,17.8954305 15.8954305,17 17,17 C18.1045695,17 19,17.8954305 19,19 C19,20.1045695 18.1045695,21 17,21 Z M17,20 C17.5522847,20 18,19.5522847 18,19 C18,18.4477153 17.5522847,18 17,18 C16.4477153,18 16,18.4477153 16,19 C16,19.5522847 16.4477153,20 17,20 Z"/></svg>
                            <span>добавить в корзину</span>
                        </a>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="banner second-banner">
        <div class="mini-banners">
            <a href="/catalog/view?id=29" class="m-b-item">
                <img src="/img/mini_banner3.png" alt="">
                <span>Футболки и майки →</span>
            </a>
            <a href="/catalog/view?id=28" class="m-b-item">
                <img src="/img/mini_banner4.png" alt="">
                <span>Часы как инвестиция →</span>
            </a>  
        </div>
        <div class="container-class">
            <a class="item-class">
                <img src="/img/banner4.png" alt="">
            </a>
        </div>
    </div>


    <div class="products-row ">
        <h2 class='p-r-title'>Рубашки</h2>
        <div class="row row-cols-4 gap-3">
            <?php foreach($shirts as $product): ?>
                    <div class="product-card">
                        <a href='/products/view?id=<?= $product->id ?>' class="card-body">
                            <div class="card-img"><img src="/products_img/<?= $product->img ?>" alt=""></div>
                            <div class="card-content">
                                <h5 class="card-price card-price<?= $product->id; ?>">
                                <script>
                                    "use script" 
                                    let cardPrices<?= $product->id; ?> = document.getElementsByClassName("card-price");
                                    for(let i = 0; i < cardPrices<?= $product->id; ?>.lenght; i++){
                                        let cardPrice<?= $product->id; ?> = cardPrices<?= $product->id; ?>[i]
                                        console.log(cardPrice<?= $product->id; ?>)

                                        let number<?= $product->id; ?> = [<?= $product->price; ?>];
                                        const pricesStr<?= $product->id; ?> = number.toLocaleString(
                                            'ru-RU', {style: 'currency', currency: "RUB"}
                                        )

                                        cardPrice<?= $product->id; ?>.textContent = pricesStr<?= $product->id; ?>
                                    }
                                </script>
                                </h5>
                                <span class='card-title'><?= $product->title ?></span>
                            </div>
                        </a>
                        <a href="/cart/add?user_id=<?=Yii::$app->user->id;?>&product_id=<?=$product->id ?>" class="btn card-btn" style='border-radius: 5px'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill='white' width="24" height="24" viewBox="0 0 24 24"> <path d="M5.50835165,12.5914912 C5.5072855,12.5857255 5.50631828,12.5799252 5.5054518,12.5740921 L4.28533671,5.25340152 C4.16478972,4.53011956 3.53900455,4 2.80574582,4 L2.5,4 C2.22385763,4 2,3.77614237 2,3.5 C2,3.22385763 2.22385763,3 2.5,3 L2.80574582,3 C3.99756372,3 5.0190253,3.84029234 5.25525588,5 L21.5,5 C21.8321894,5 22.0720214,5.31795246 21.980762,5.63736056 L19.980762,12.6373606 C19.9194332,12.8520113 19.7232402,13 19.5,13 L6.59023021,13 L6.71466329,13.7465985 C6.83521028,14.4698804 7.46099545,15 8.19425418,15 L19.5,15 C19.7761424,15 20,15.2238576 20,15.5 C20,15.7761424 19.7761424,16 19.5,16 L8.19425418,16 C6.97215629,16 5.92918102,15.1164674 5.72826937,13.9109975 L5.5083519,12.5914927 L5.50835165,12.5914912 Z M5.42356354,6 L6.42356354,12 L19.1228493,12 L20.837135,6 L5.42356354,6 Z M8,21 C6.8954305,21 6,20.1045695 6,19 C6,17.8954305 6.8954305,17 8,17 C9.1045695,17 10,17.8954305 10,19 C10,20.1045695 9.1045695,21 8,21 Z M8,20 C8.55228475,20 9,19.5522847 9,19 C9,18.4477153 8.55228475,18 8,18 C7.44771525,18 7,18.4477153 7,19 C7,19.5522847 7.44771525,20 8,20 Z M17,21 C15.8954305,21 15,20.1045695 15,19 C15,17.8954305 15.8954305,17 17,17 C18.1045695,17 19,17.8954305 19,19 C19,20.1045695 18.1045695,21 17,21 Z M17,20 C17.5522847,20 18,19.5522847 18,19 C18,18.4477153 17.5522847,18 17,18 C16.4477153,18 16,18.4477153 16,19 C16,19.5522847 16.4477153,20 17,20 Z"/></svg>
                            <span>добавить в корзину</span>
                        </a>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="products-row ">
        <h2 class='p-r-title'>Тапочки</h2>
        <div class="row row-cols-4 gap-3">
            <?php foreach($slippers as $product): ?>
                    <div class="product-card">
                        <a href='/products/view?id=<?= $product->id ?>' class="card-body">
                            <div class="card-img"><img src="/products_img/<?= $product->img ?>" alt=""></div>
                            <div class="card-content">
                                <h5 class="card-price card-price<?= $product->id; ?>">
                                <script>
                                    "use script" 
                                    let cardPrices<?= $product->id; ?> = document.getElementsByClassName("card-price");
                                    for(let i = 0; i < cardPrices<?= $product->id; ?>.lenght; i++){
                                        let cardPrice<?= $product->id; ?> = cardPrices<?= $product->id; ?>[i]
                                        console.log(cardPrice<?= $product->id; ?>)

                                        let number<?= $product->id; ?> = [<?= $product->price; ?>];
                                        const pricesStr<?= $product->id; ?> = number.toLocaleString(
                                            'ru-RU', {style: 'currency', currency: "RUB"}
                                        )

                                        cardPrice<?= $product->id; ?>.textContent = pricesStr<?= $product->id; ?>
                                    }
                                </script>
                                </h5>
                                <span class='card-title'><?= $product->title ?></span>
                            </div>
                        </a>
                        <a href="/cart/add?user_id=<?=Yii::$app->user->id;?>&product_id=<?=$product->id ?>" class="btn card-btn" style='border-radius: 5px'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill='white' width="24" height="24" viewBox="0 0 24 24"> <path d="M5.50835165,12.5914912 C5.5072855,12.5857255 5.50631828,12.5799252 5.5054518,12.5740921 L4.28533671,5.25340152 C4.16478972,4.53011956 3.53900455,4 2.80574582,4 L2.5,4 C2.22385763,4 2,3.77614237 2,3.5 C2,3.22385763 2.22385763,3 2.5,3 L2.80574582,3 C3.99756372,3 5.0190253,3.84029234 5.25525588,5 L21.5,5 C21.8321894,5 22.0720214,5.31795246 21.980762,5.63736056 L19.980762,12.6373606 C19.9194332,12.8520113 19.7232402,13 19.5,13 L6.59023021,13 L6.71466329,13.7465985 C6.83521028,14.4698804 7.46099545,15 8.19425418,15 L19.5,15 C19.7761424,15 20,15.2238576 20,15.5 C20,15.7761424 19.7761424,16 19.5,16 L8.19425418,16 C6.97215629,16 5.92918102,15.1164674 5.72826937,13.9109975 L5.5083519,12.5914927 L5.50835165,12.5914912 Z M5.42356354,6 L6.42356354,12 L19.1228493,12 L20.837135,6 L5.42356354,6 Z M8,21 C6.8954305,21 6,20.1045695 6,19 C6,17.8954305 6.8954305,17 8,17 C9.1045695,17 10,17.8954305 10,19 C10,20.1045695 9.1045695,21 8,21 Z M8,20 C8.55228475,20 9,19.5522847 9,19 C9,18.4477153 8.55228475,18 8,18 C7.44771525,18 7,18.4477153 7,19 C7,19.5522847 7.44771525,20 8,20 Z M17,21 C15.8954305,21 15,20.1045695 15,19 C15,17.8954305 15.8954305,17 17,17 C18.1045695,17 19,17.8954305 19,19 C19,20.1045695 18.1045695,21 17,21 Z M17,20 C17.5522847,20 18,19.5522847 18,19 C18,18.4477153 17.5522847,18 17,18 C16.4477153,18 16,18.4477153 16,19 C16,19.5522847 16.4477153,20 17,20 Z"/></svg>
                            <span>добавить в корзину</span>
                        </a>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="products-row ">
        <h2 class='p-r-title'>Кепки</h2>
        <div class="row row-cols-4 gap-3">
            <?php foreach($caps as $product): ?>
                    <div class="product-card">
                        <a href='/products/view?id=<?= $product->id ?>' class="card-body">
                            <div class="card-img"><img src="/products_img/<?= $product->img ?>" alt=""></div>
                            <div class="card-content">
                                <h5 class="card-price card-price<?= $product->id; ?>">
                                <script>
                                    "use script" 
                                    let cardPrices<?= $product->id; ?> = document.getElementsByClassName("card-price");
                                    for(let i = 0; i < cardPrices<?= $product->id; ?>.lenght; i++){
                                        let cardPrice<?= $product->id; ?> = cardPrices<?= $product->id; ?>[i]
                                        console.log(cardPrice<?= $product->id; ?>)

                                        let number<?= $product->id; ?> = [<?= $product->price; ?>];
                                        const pricesStr<?= $product->id; ?> = number.toLocaleString(
                                            'ru-RU', {style: 'currency', currency: "RUB"}
                                        )

                                        cardPrice<?= $product->id; ?>.textContent = pricesStr<?= $product->id; ?>
                                    }
                                </script>
                                </h5>
                                <span class='card-title'><?= $product->title ?></span>
                            </div>
                        </a>
                        <a href="/cart/add?user_id=<?=Yii::$app->user->id;?>&product_id=<?=$product->id ?>" class="btn card-btn" style='border-radius: 5px'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill='white' width="24" height="24" viewBox="0 0 24 24"> <path d="M5.50835165,12.5914912 C5.5072855,12.5857255 5.50631828,12.5799252 5.5054518,12.5740921 L4.28533671,5.25340152 C4.16478972,4.53011956 3.53900455,4 2.80574582,4 L2.5,4 C2.22385763,4 2,3.77614237 2,3.5 C2,3.22385763 2.22385763,3 2.5,3 L2.80574582,3 C3.99756372,3 5.0190253,3.84029234 5.25525588,5 L21.5,5 C21.8321894,5 22.0720214,5.31795246 21.980762,5.63736056 L19.980762,12.6373606 C19.9194332,12.8520113 19.7232402,13 19.5,13 L6.59023021,13 L6.71466329,13.7465985 C6.83521028,14.4698804 7.46099545,15 8.19425418,15 L19.5,15 C19.7761424,15 20,15.2238576 20,15.5 C20,15.7761424 19.7761424,16 19.5,16 L8.19425418,16 C6.97215629,16 5.92918102,15.1164674 5.72826937,13.9109975 L5.5083519,12.5914927 L5.50835165,12.5914912 Z M5.42356354,6 L6.42356354,12 L19.1228493,12 L20.837135,6 L5.42356354,6 Z M8,21 C6.8954305,21 6,20.1045695 6,19 C6,17.8954305 6.8954305,17 8,17 C9.1045695,17 10,17.8954305 10,19 C10,20.1045695 9.1045695,21 8,21 Z M8,20 C8.55228475,20 9,19.5522847 9,19 C9,18.4477153 8.55228475,18 8,18 C7.44771525,18 7,18.4477153 7,19 C7,19.5522847 7.44771525,20 8,20 Z M17,21 C15.8954305,21 15,20.1045695 15,19 C15,17.8954305 15.8954305,17 17,17 C18.1045695,17 19,17.8954305 19,19 C19,20.1045695 18.1045695,21 17,21 Z M17,20 C17.5522847,20 18,19.5522847 18,19 C18,18.4477153 17.5522847,18 17,18 C16.4477153,18 16,18.4477153 16,19 C16,19.5522847 16.4477153,20 17,20 Z"/></svg>
                            <span>добавить в корзину</span>
                        </a>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>