<?php
/**
 * Created by PhpStorm.
 * User: Semen
 * Date: 17.01.2019
 * Time: 16:55
 */

namespace app\models;


use yii\db\ActiveRecord;
use Yii;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

//    public function getCategories()
//    {
//        return Category::find()->asArray()->all();
//    }

    public function getCategories()
    {
        $menuGoods = Yii::$app->cache->get('menuGoods');
        if (!$menuGoods) {
            $menuGoods = Category::find()->asArray()->all();
            Yii::$app->cache->set('menuGoods', $menuGoods, 30);
        }
        return $menuGoods;
    }
}