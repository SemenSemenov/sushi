<?php use yii\helpers\Url; ?>
<?= \app\widgets\MenuWidget::widget() ?>
<?php $this->title = 'Вкусные Суши'; ?>
<div class="container">
        <div class="row">

            <?php foreach ($goods as $good):?>
            <div class="col-4">
                <div class="product">
                    <div class="product-img">
                        <img src="/img/<?= $good['img'] ?>" alt="<?= $good['descr'] ?>">
                    </div>
                    <div class="product-name"><?= $good['name'] ?></div>
                    <div class="product-descr"><?= $good['composition'] ?></div>
                    <div class="product-price"><?= $good['price'] ?></div>
                    <div class="product-buttons">
                        <button type="button" data-name="<?=$good['link_name']?>" class="product-button__add btn btn-success">Заказать</button>
                        <a href="<?= Url::to(['good/index', 'name' => $good['link_name']]) ?>" type="button" class="product-button__more btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
</div>