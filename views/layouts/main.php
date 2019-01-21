<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title)?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody()?>
<section class="body">
    <header>
        <div class="container">
            <div class="header">
                <a href="/">На главную</a>
                <?php if (!Yii::$app->user->isGuest) { ?>
                    <a href="/admin">Админка</a>
                <?php } ?>
                <?php if (Yii::$app->user->isGuest) { ?>
                <a href="/admin/login">Вход в админку</a>
                <?php } else { ?>
                <a href="/admin/logout">Выход из админки</a>
                <?php } ?>
                <a href="#" onclick="openCart(event)">Корзина <span class="menu-quantity">(<?= isset($_SESSION['cart.totalQuantity']) ? $_SESSION['cart.totalQuantity'] : 0 ?>)</span></a>
                <form method="get" action="<?= Url::to(['category/search']) ?>">
                    <input type="text" style="padding: 5px" placeholder="Поиск..." name="search">
                </form>
            </div>
        </div>
    </header>
    <div class="container">
        <?= $content ?>
    </div>
    <footer>
        <div class="container">
            <div class="footer">
                &copy; Все права защищены или типа того
            </div>
        </div>
    </footer>
</section>
<div id="cart" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        </div>
    </div>
</div>

<div id="order" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
