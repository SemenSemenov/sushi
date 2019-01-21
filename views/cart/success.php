<?php
$this->title = 'Вкусные Суши || Спасибо за заказ';
if (isset($_SESSION['successOrder'])) { ?>
    <h1 class="product text-center">Ваш заказ под номером <?= isset($currentId) ? $currentId : $_SESSION['successOrder']?> принят</h1>
<div class="row justify-content-around">
    <a href="/" class="btn btn-success text-center col-3">Вернуться на главную</a>
</div>
<?php }?>



