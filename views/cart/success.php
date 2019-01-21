<?php $this->title = 'Вкусные Суши || Спасибо за заказ';?>
<?php
if(!$session) {
    if(!empty($_POST)) {
        header( 'Location: index.php' );
    }

}
?>
<h1 class="product text-center">Ваш заказ под номером <?= $currentId?> принят</h1>
<div class="row justify-content-around">
    <a href="/" class="btn btn-success text-center col-3">Вернуться на главную</a>
</div>