<?php

namespace app\controllers;

use app\entity\Orders;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\repository\OrdersRepository;
use app\repository\BasketRepository;
use Yii;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    public function actionAdd($user_id, $user_products = [])
    {
        if(!empty(array_pop(OrdersRepository::getAll())->order_id)){
            $order_id = array_pop(OrdersRepository::getAll())->order_id + 1;
        }else{
            $order_id = 1;
        }

        $fullPrice = $_SESSION['fullPrice'];

        foreach ($_SESSION['user_products'] as $user_product)
        {
            OrdersRepository::addProductToOrders($order_id, $user_id, $user_product, $fullPrice);
        }

        BasketRepository::deleteAllFromBasket();

        return $this->redirect('/');
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
