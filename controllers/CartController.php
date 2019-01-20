<?php
/**
 * Created by PhpStorm.
 * User: Semen
 * Date: 19.01.2019
 * Time: 19:05
 */

namespace app\controllers;


use app\models\Cart;
use yii\web\Controller;
use app\models\Good;
use Yii;

class CartController extends Controller
{
    public function actionOpen()
    {
        $session = Yii::$app->session;
        $session->open();
        return $this->renderPartial('cart', compact('session'));

    }

    public function actionAdd($name)
    {
        $good = new Good();
        $good = $good->getOneGood($name);
        $session = Yii::$app->session;
        $session->open();
//        $session->remove('cart');
        $cart = new Cart();
        $cart->addToCart($good);
        return $this->renderPartial('cart', compact('good', 'session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.totalQuantity');
        $session->remove('cart.totalSum');
        return $this->renderPartial('cart', compact('session'));
    }

    public function actionDelete($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart;
        $cart->recalcCart($id);
        return $this->renderPartial('cart', compact('session'));
    }

    public function actionOrder()
    {
        $session = Yii::$app->session;
        $session->open();
        return $this->renderPartial('order', compact('session'));
    }
}