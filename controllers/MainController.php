<?php 

namespace app\controllers;

use yii\web\Controller;
use app\repository\CategoryRepository;
use app\repository\ProductRepository;


class MainController extends Controller
{
    public function actionIndex()
    {
        $sneakers = ProductRepository::getProductsByCategoryId(CategoryRepository::getOneFromCategories(['title' => 'Кроссовки'])->id);
        $shirts = ProductRepository::getProductsByCategoryId(CategoryRepository::getOneFromCategories(['title' => 'Рубашки'])->id);
        $slippers = ProductRepository::getProductsByCategoryId(CategoryRepository::getOneFromCategories(['title' => 'Тапочки'])->id);
        $caps = ProductRepository::getProductsByCategoryId(CategoryRepository::getOneFromCategories(['title' => 'Кепки'])->id);

        $categories = CategoryRepository::getAll();

        return $this->render('index', 
        [
            'sneakers' => $sneakers, 
            'categories' => $categories, 
            'shirts' => $shirts, 
            'slippers' => $slippers,
            'caps' => $caps
        ]);
    }

    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
}