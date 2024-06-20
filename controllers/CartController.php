<?php

namespace app\controllers;
use app\entity\Basket;
use app\repository\BasketRepository;
use app\repository\ProductRepository;
use yii\filters\AccessControl;
use Yii;


class CartController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'add'],
                'rules' => [
                    [
                        'actions' => ['index', 'add'],
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $basket_products = BasketRepository::getAll();
        $products = ProductRepository::getAll();

        return $this->render('index', ['basket_products' => $basket_products, 'products' => $products]);
    }

    public function actionAdd($user_id, $product_id)
    {
        BasketRepository::addProductToBasket($user_id, $product_id);
        
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDelete($id){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Basket::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

