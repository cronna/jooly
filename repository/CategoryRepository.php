<?php

namespace app\repository;
use app\entity\Categories;
class CategoryRepository
{

    public static function getAll()
    {
        return CAtegories::find()->all();
    }

    public static function getCategory($where = [], $orderBy = null)
    {
        return Categories::find()->where($where)->orderBy($orderBy)->all();
    }
    public static function getOneFromCategories($where = [])
    {
        return Categories::find()->where($where)->one();
    }

}