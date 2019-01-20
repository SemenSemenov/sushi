<?php
use yii\widgets\ActiveForm;
?>

<h2 class="text-center header-order">Оформление заказа</h2>

<?php $form = \yii\bootstrap\ActiveForm::begin()  ?>

<?= $form->field($order, 'name');?>
<?= $form->field($order, 'email');?>
<?= $form->field($order, 'phone');?>
<?= $form->field($order, 'address');?>
<button class="btn btn-success btn-order-success">Оформить заказ</button>

<?php $form = \yii\bootstrap\ActiveForm::end()  ?>