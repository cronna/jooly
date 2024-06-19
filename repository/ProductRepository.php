<?php

namespace app\repository;
use app\entity\Products;

class ProductRepository
{
    public static function getAll()
    {
        return Products::find()->all();
    }

    public static function getProductById($id){
        return Products::findOne(['id' => $id]);
    }

    public static function getProductsByCategoryId($id)
    {
        return Products::find()->where(['category_id' => $id])->all();
    }
}