<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\web\IdentityInterface;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <div class="container">
        <div class="header">
            <div class="user-city">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><path stroke="black" d="M21 3.5l-.5-.5-17 6.5v1l8 2 2 8h1l6.5-17z"></path></svg>
                <span>г. Астрахань</span>
            </div>

            <div class="main-logo">
                <a href="<?= Yii::$app->homeUrl ?>">
                    <h1>JOOLY</h1>
                </a>
            </div>

            <div class="controlls">
                <?php if (Yii::$app->user->isGuest) {?>
                    <a href='/user/authorisation' class="user-profile-link">
                        <svg style='margin-top: -3px;' width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.5 11.831l-7 3.669S3 17 3.61 18.606C4.22 20.212 5 20.5 6.5 20.5h11c1.5 0 2.28-.29 2.89-1.895C21 17 21.5 15.5 21.5 15.5l-7-3.669m2.668 1.399C16 14.7 13.923 15.5 12.02 15.5a7.12 7.12 0 0 1-3.32-.8M17 7.5a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" stroke="#000"></path></svg>
                        <span>Войти</span>
                    </a>
                <?php } else{?>
                    <a href='/user/profile?id=<?= Yii::$app->user->id ?>' class="user-profile-link">
                        <svg style='margin-top: -3px;' width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.5 11.831l-7 3.669S3 17 3.61 18.606C4.22 20.212 5 20.5 6.5 20.5h11c1.5 0 2.28-.29 2.89-1.895C21 17 21.5 15.5 21.5 15.5l-7-3.669m2.668 1.399C16 14.7 13.923 15.5 12.02 15.5a7.12 7.12 0 0 1-3.32-.8M17 7.5a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" stroke="#000"></path></svg>
                        <span>Профиль</span>
                    </a>
                <?php } ?>
                <a href='/cart/' class="cart-link">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.5 2.5h-13L3.747 18.28a2 2 0 0 0 1.988 2.22h12.53a2 2 0 0 0 1.988-2.22L18.5 2.5z" stroke="#000"></path><path d="M15.5 9a3.5 3.5 0 1 1-7 0m0-2V5m7 2V5" stroke="#000"></path></svg>
                    <span>Корзина</span>
                </a>
            </div>
        </div>
        <div class="sec-header">
            <div class="catalog-link">
                <a href='/catalog/'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill='white' viewBox="0 0 12 16"><path fill-rule="evenodd" d="M11.41 9H.59C0 9 0 8.59 0 8c0-.59 0-1 .59-1H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1h.01zm0-4H.59C0 5 0 4.59 0 4c0-.59 0-1 .59-1H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1h.01zM.59 11H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1H.59C0 13 0 12.59 0 12c0-.59 0-1 .59-1z"/></svg>
                    <span>Каталог</span>
                </a>
            </div>
            <div class="catalog-nav">
                <a href="">Новинки</a>
                <a href="">Одежда</a>
                <a href="">Обувь</a>
                <a href="">Аксессуары</a>
                <a href="">Спорт</a>
                <a href="">Premium</a>
            </div>
            <form action="" class="search-form">
                <input type="text" placeholder='Поиск'>
                <button><svg xmlns="http://www.w3.org/2000/svg" fill='white'  viewBox="0 0 50 50" width="25px" height="25px"><path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"/></svg></button>
            </form>
        </div>
    </div>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="footer-map">
        <iframe id="map_888990260" frameborder="0" width="100%" height="600px" sandbox="allow-modals allow-forms allow-scripts allow-same-origin allow-popups allow-top-navigation-by-user-activation"></iframe><script type="text/javascript">(function(e,t){var r=document.getElementById(e);r.contentWindow.document.open(),r.contentWindow.document.write(atob(t)),r.contentWindow.document.close()})("map_888990260", "PGJvZHk+PHN0eWxlPgogICAgICAgIGh0bWwsIGJvZHkgewogICAgICAgICAgICBtYXJnaW46IDA7CiAgICAgICAgICAgIHBhZGRpbmc6IDA7CiAgICAgICAgfQogICAgICAgIGh0bWwsIGJvZHksICNtYXAgewogICAgICAgICAgICB3aWR0aDogMTAwJTsKICAgICAgICAgICAgaGVpZ2h0OiAxMDAlOwogICAgICAgIH0KICAgICAgICAuYnVsbGV0LW1hcmtlciB7CiAgICAgICAgICAgIHdpZHRoOiAyMHB4OwogICAgICAgICAgICBoZWlnaHQ6IDIwcHg7CiAgICAgICAgICAgIGJveC1zaXppbmc6IGJvcmRlci1ib3g7CiAgICAgICAgICAgIGJhY2tncm91bmQtY29sb3I6ICNmZmY7CiAgICAgICAgICAgIGJveC1zaGFkb3c6IDAgMXB4IDNweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTsKICAgICAgICAgICAgYm9yZGVyOiA0cHggc29saWQgIzAyODFmMjsKICAgICAgICAgICAgYm9yZGVyLXJhZGl1czogNTAlOwogICAgICAgIH0KICAgICAgICAucGVybWFuZW50LXRvb2x0aXAgewogICAgICAgICAgICBiYWNrZ3JvdW5kOiBub25lOwogICAgICAgICAgICBib3gtc2hhZG93OiBub25lOwogICAgICAgICAgICBib3JkZXI6IG5vbmU7CiAgICAgICAgICAgIHBhZGRpbmc6IDZweCAxMnB4OwogICAgICAgICAgICBjb2xvcjogIzI2MjYyNjsKICAgICAgICB9CiAgICAgICAgLnBlcm1hbmVudC10b29sdGlwOmJlZm9yZSB7CiAgICAgICAgICAgIGRpc3BsYXk6IG5vbmU7CiAgICAgICAgfQogICAgICAgIC5kZy1wb3B1cF9oaWRkZW5fdHJ1ZSB7CiAgICAgICAgICAgIGRpc3BsYXk6IGJsb2NrOwogICAgICAgIH0KICAgICAgICAubGVhZmxldC1jb250YWluZXIgLmxlYWZsZXQtcG9wdXAgLmxlYWZsZXQtcG9wdXAtY2xvc2UtYnV0dG9uIHsKICAgICAgICAgICAgdG9wOiAwOwogICAgICAgICAgICByaWdodDogMDsKICAgICAgICAgICAgd2lkdGg6IDIwcHg7CiAgICAgICAgICAgIGhlaWdodDogMjBweDsKICAgICAgICAgICAgZm9udC1zaXplOiAyMHB4OwogICAgICAgICAgICBsaW5lLWhlaWdodDogMTsKICAgICAgICB9CiAgICA8L3N0eWxlPjxkaXYgaWQ9Im1hcCI+PC9kaXY+PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiIHNyYz0iaHR0cHM6Ly9tYXBzLmFwaS4yZ2lzLnJ1LzIuMC9sb2FkZXIuanM/cGtnPWZ1bGwmYW1wO3NraW49bGlnaHQiPjwvc2NyaXB0PjxzY3JpcHQ+KGZ1bmN0aW9uKGUpe3ZhciB0PUpTT04ucGFyc2UoZSkscj10Lm9yZGVyZWRHZW9tZXRyaWVzLG49dC5tYXBQb3NpdGlvbixhPXQuaXNXaGVlbFpvb21FbmFibGVkO2Z1bmN0aW9uIG8oZSl7cmV0dXJuIGRlY29kZVVSSUNvbXBvbmVudChhdG9iKGUpLnNwbGl0KCIiKS5tYXAoZnVuY3Rpb24oZSl7cmV0dXJuIiUiKygiMDAiK2UuY2hhckNvZGVBdCgwKS50b1N0cmluZygxNikpLnNsaWNlKC0yKX0pLmpvaW4oIiIpKX1ERy50aGVuKGZ1bmN0aW9uKCl7dmFyIGU9REcubWFwKCJtYXAiLHtjZW50ZXI6W24ubGF0LG4ubG9uXSx6b29tOm4uem9vbSxzY3JvbGxXaGVlbFpvb206YSx6b29tQ29udHJvbDohYX0pO0RHLmdlb0pTT04ocix7c3R5bGU6ZnVuY3Rpb24oZSl7dmFyIHQscixuLGEsbztyZXR1cm57ZmlsbENvbG9yOm51bGw9PT0odD1lKXx8dm9pZCAwPT09dD92b2lkIDA6dC5wcm9wZXJ0aWVzLmZpbGxDb2xvcixmaWxsT3BhY2l0eTpudWxsPT09KHI9ZSl8fHZvaWQgMD09PXI/dm9pZCAwOnIucHJvcGVydGllcy5maWxsT3BhY2l0eSxjb2xvcjpudWxsPT09KG49ZSl8fHZvaWQgMD09PW4/dm9pZCAwOm4ucHJvcGVydGllcy5zdHJva2VDb2xvcix3ZWlnaHQ6bnVsbD09PShhPWUpfHx2b2lkIDA9PT1hP3ZvaWQgMDphLnByb3BlcnRpZXMuc3Ryb2tlV2lkdGgsb3BhY2l0eTpudWxsPT09KG89ZSl8fHZvaWQgMD09PW8/dm9pZCAwOm8ucHJvcGVydGllcy5zdHJva2VPcGFjaXR5fX0scG9pbnRUb0xheWVyOmZ1bmN0aW9uKGUsdCl7cmV0dXJuInJhZGl1cyJpbiBlLnByb3BlcnRpZXM/REcuY2lyY2xlKHQsZS5wcm9wZXJ0aWVzLnJhZGl1cyk6REcubWFya2VyKHQse2ljb246ZnVuY3Rpb24oZSl7cmV0dXJuIERHLmRpdkljb24oe2h0bWw6IjxkaXYgY2xhc3M9J2J1bGxldC1tYXJrZXInIHN0eWxlPSdib3JkZXItY29sb3I6ICIrZSsiOyc+PC9kaXY+IixjbGFzc05hbWU6Im92ZXJyaWRlLWRlZmF1bHQiLGljb25TaXplOlsyMCwyMF0saWNvbkFuY2hvcjpbMTAsMTBdfSl9KGUucHJvcGVydGllcy5jb2xvcil9KX0sb25FYWNoRmVhdHVyZTpmdW5jdGlvbihlLHQpe2UucHJvcGVydGllcy5kZXNjcmlwdGlvbiYmdC5iaW5kUG9wdXAobyhlLnByb3BlcnRpZXMuZGVzY3JpcHRpb24pLHtjbG9zZUJ1dHRvbjohMCxjbG9zZU9uRXNjYXBlS2V5OiEwfSksZS5wcm9wZXJ0aWVzLnRpdGxlJiZ0LmJpbmRUb29sdGlwKG8oZS5wcm9wZXJ0aWVzLnRpdGxlKSx7cGVybWFuZW50OiEwLG9wYWNpdHk6MSxjbGFzc05hbWU6InBlcm1hbmVudC10b29sdGlwIn0pfX0pLmFkZFRvKGUpfSl9KSgneyJvcmRlcmVkR2VvbWV0cmllcyI6W3sidHlwZSI6IkZlYXR1cmUiLCJwcm9wZXJ0aWVzIjp7ImNvbG9yIjoiIzAwMDAwMCIsInRpdGxlIjoiU2s5UFRGaz0iLCJkZXNjcmlwdGlvbiI6IiIsInpJbmRleCI6MTAwMDAwMDAwMH0sImdlb21ldHJ5Ijp7InR5cGUiOiJQb2ludCIsImNvb3JkaW5hdGVzIjpbMzcuNjIxNzcsNTUuNzUzMjM5XX0sImlkIjo2Nn0seyJ0eXBlIjoiRmVhdHVyZSIsInByb3BlcnRpZXMiOnsiY29sb3IiOiIjMDAwMDAwIiwidGl0bGUiOiJTazlQVEhrPSIsImRlc2NyaXB0aW9uIjoiIiwiekluZGV4IjoxMDAwMDAwMDAwfSwiZ2VvbWV0cnkiOnsidHlwZSI6IlBvaW50IiwiY29vcmRpbmF0ZXMiOlszNy42NjQyOTQsNTUuNzU4MDk5XX0sImlkIjoxMzN9LHsidHlwZSI6IkZlYXR1cmUiLCJwcm9wZXJ0aWVzIjp7ImNvbG9yIjoiIzAwMDAwMCIsInRpdGxlIjoiU2tGTVRGaz0iLCJkZXNjcmlwdGlvbiI6IlBIQSswSkhRdU5DMzBMM1F0ZEdCSU5DbTBMWFF2ZEdDMFlBZzBKelF2dEdCMExyUXN0Q3dJTkNoMExqUmd0QzRQQzl3UGc9PSIsInpJbmRleCI6MTAwMDAwMDAwMH0sImdlb21ldHJ5Ijp7InR5cGUiOiJQb2ludCIsImNvb3JkaW5hdGVzIjpbMzcuNTM2MjI5LDU1Ljc0NzcxM119LCJpZCI6MTY2fV0sIm1hcFBvc2l0aW9uIjp7ImxhdCI6NTUuNzUzMDA4NjYxOTc0MTcsImxvbiI6MzcuNjIwMjExNDQwNDkxNjk0LCJ6b29tIjoxMX0sImlzV2hlZWxab29tRW5hYmxlZCI6dHJ1ZX0nKTwvc2NyaXB0PjxzY3JpcHQgYXN5bmM9IiIgdHlwZT0idGV4dC9qYXZhc2NyaXB0IiBzcmM9Imh0dHBzOi8vd3d3Lmdvb2dsZXRhZ21hbmFnZXIuY29tL2d0YWcvanM/aWQ9VUEtMTU4ODY2MTY4LTEiPjwvc2NyaXB0PjxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0Ij4oZnVuY3Rpb24oZSl7ZnVuY3Rpb24gdCgpe2RhdGFMYXllci5wdXNoKGFyZ3VtZW50cyl9d2luZG93LmRhdGFMYXllcj13aW5kb3cuZGF0YUxheWVyfHxbXSx0KCJqcyIsbmV3IERhdGUpLHQoImNvbmZpZyIsZSksd2luZG93Lmd0YWc9dH0pKCdVQS0xNTg4NjYxNjgtMScpPC9zY3JpcHQ+PC9ib2R5Pg==")</script>
    </div>
    <div class="footer-info">
        <div class="footer-logo"><a href=""><h1>JOOLY</h1></a></div>
        <div class="social-links">
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 26 26" width="32px" height="32px"><path fill-rule="evenodd" d="M 21.269531 0 L 5.464844 0 C 2.660156 0 0 2.199219 0 5 L 0 20.8125 C 0 23.613281 2.660156 26 5.464844 26 L 21.273438 26 C 24.074219 26 26 23.613281 26 20.8125 L 26 5 C 26 2.199219 24.074219 0 21.269531 0 Z M 20.3125 15.007813 C 21.734375 16.328125 22.03125 16.972656 22.078125 17.050781 C 22.667969 18.03125 21.425781 18.105469 21.425781 18.105469 L 19.050781 18.140625 C 19.050781 18.140625 18.539063 18.242188 17.867188 17.777344 C 16.976563 17.171875 16.140625 15.585938 15.484375 15.789063 C 14.824219 16 14.84375 17.429688 14.84375 17.429688 C 14.84375 17.429688 14.847656 17.679688 14.699219 17.84375 C 14.535156 18.015625 14.214844 18 14.214844 18 L 13.148438 18 C 13.148438 18 10.800781 18.195313 8.734375 16.042969 C 6.480469 13.695313 4.492188 9.066406 4.492188 9.066406 C 4.492188 9.066406 4.378906 8.773438 4.5 8.625 C 4.640625 8.460938 5.023438 8.453125 5.023438 8.453125 L 7.566406 8.441406 C 7.566406 8.441406 7.804688 8.484375 7.976563 8.609375 C 8.117188 8.710938 8.199219 8.90625 8.199219 8.90625 C 8.199219 8.90625 8.609375 9.949219 9.152344 10.886719 C 10.214844 12.722656 10.710938 13.125 11.070313 12.929688 C 11.597656 12.640625 11.4375 10.335938 11.4375 10.335938 C 11.4375 10.335938 11.449219 9.496094 11.171875 9.121094 C 10.960938 8.835938 10.5625 8.75 10.382813 8.726563 C 10.238281 8.707031 10.476563 8.375 10.78125 8.226563 C 11.238281 8.003906 12.046875 7.988281 13 8 C 13.742188 8.007813 13.957031 8.054688 14.246094 8.125 C 15.125 8.335938 14.828125 9.152344 14.828125 11.113281 C 14.828125 11.742188 14.714844 12.625 15.167969 12.917969 C 15.363281 13.042969 15.839844 12.9375 17.027344 10.914063 C 17.59375 9.953125 18.015625 8.828125 18.015625 8.828125 C 18.015625 8.828125 18.109375 8.625 18.253906 8.539063 C 18.402344 8.453125 18.601563 8.480469 18.601563 8.480469 L 21.277344 8.460938 C 21.277344 8.460938 22.078125 8.367188 22.210938 8.730469 C 22.347656 9.109375 21.910156 10 20.816406 11.457031 C 19.019531 13.847656 18.820313 13.625 20.3125 15.007813 Z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 64 64" width="40px" height="40px"><path d="M 21.580078 7 C 13.541078 7 7 13.544938 7 21.585938 L 7 42.417969 C 7 50.457969 13.544938 57 21.585938 57 L 42.417969 57 C 50.457969 57 57 50.455062 57 42.414062 L 57 21.580078 C 57 13.541078 50.455062 7 42.414062 7 L 21.580078 7 z M 47 15 C 48.104 15 49 15.896 49 17 C 49 18.104 48.104 19 47 19 C 45.896 19 45 18.104 45 17 C 45 15.896 45.896 15 47 15 z M 32 19 C 39.17 19 45 24.83 45 32 C 45 39.17 39.169 45 32 45 C 24.83 45 19 39.169 19 32 C 19 24.831 24.83 19 32 19 z M 32 23 C 27.029 23 23 27.029 23 32 C 23 36.971 27.029 41 32 41 C 36.971 41 41 36.971 41 32 C 41 27.029 36.971 23 32 23 z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="40px" height="40px"><path d="M 44.898438 14.5 C 44.5 12.300781 42.601563 10.699219 40.398438 10.199219 C 37.101563 9.5 31 9 24.398438 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.398438 17 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.898438 40.5 17.898438 41 24.5 41 C 31.101563 41 37.101563 40.5 40.601563 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.101563 35.5 C 45.5 33 46 29.398438 46.101563 25 C 45.898438 20.5 45.398438 17 44.898438 14.5 Z M 19 32 L 19 18 L 31.199219 25 Z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="34px" height="34px"><path d="M25,2c12.703,0,23,10.297,23,23S37.703,48,25,48S2,37.703,2,25S12.297,2,25,2z M32.934,34.375	c0.423-1.298,2.405-14.234,2.65-16.783c0.074-0.772-0.17-1.285-0.648-1.514c-0.578-0.278-1.434-0.139-2.427,0.219	c-1.362,0.491-18.774,7.884-19.78,8.312c-0.954,0.405-1.856,0.847-1.856,1.487c0,0.45,0.267,0.703,1.003,0.966	c0.766,0.273,2.695,0.858,3.834,1.172c1.097,0.303,2.346,0.04,3.046-0.395c0.742-0.461,9.305-6.191,9.92-6.693	c0.614-0.502,1.104,0.141,0.602,0.644c-0.502,0.502-6.38,6.207-7.155,6.997c-0.941,0.959-0.273,1.953,0.358,2.351	c0.721,0.454,5.906,3.932,6.687,4.49c0.781,0.558,1.573,0.811,2.298,0.811C32.191,36.439,32.573,35.484,32.934,34.375z"/></svg>
        </div>
        <ul>
            <li><a href='#'>О нас</a></li>
            <li><a href='#'>Доставка</a></li>
            <li><a href='#'>Возврат</a></li>
            <li><a href='#'>Как выбрать размер</a></li>
            <li><a href='#'>Политика</a></li>
        </ul>
        <span class='footer-company-info'>© 2024 OOO «Jooly»</span>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
