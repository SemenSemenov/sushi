<?php
/**
 * Created by PhpStorm.
 * User: Semen
 * Date: 19.01.2019
 * Time: 19:05
 */

namespace app\controllers;


use app\models\Cart;
use app\widgets\Alert;
use yii\web\Controller;
use app\models\Good;
use app\models\Order;
use app\models\OrderGood;
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
        $order = new Order;
        if($session['cart.totalSum']) {
            if ($order->load(Yii::$app->request->post())){
                $order->date = date('Y-m-d H:i:s');
                $order->sum = $session['cart.totalSum'];

                if ($order->save()){
                    Yii::$app->mailer->compose()
                        ->setFrom(['aaa@aaaa.ru' => 'test test'])
                        ->setTo('asdasd@sdadas.ru')
                        ->setSubject('Ваш заказ принят')
                        ->send();
                    $session->remove('cart');
                    $session->remove('cart.totalQuantity');
                    $session->remove('cart.totalSum');
                    return $this->render('success', compact('session'));
                }
            }
        }else {
            echo 'Что-то пошло не так';
        }
        $this->layout = 'empty-layout';
        return $this->render('order', compact('session', 'order'));
    }
}