<?php use yii\helpers\Url; ?>
<?php $this->title = 'Результат поиска по запросу ' . $search; ?>
<div class="container">
    <h2 class="product" style="text-align: center;">Результаты поиска по запросу <?= $search ?></h2>
    <?php if($goods) {?>
    <div class="row justify-content-center">
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
    <?php } else { ?>
        <h4 class="product" style="text-align: center;">Нчиего не найдено :(</h4>
        <?php } ?>
    </div>
</div>