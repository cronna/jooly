<?php

namespace app\controllers;

use app\entity\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\repository\UserRepository;
use Yii;
use app\models\AuthForm;
use app\models\RegistrationModel;
use app\repository\OrdersRepository;
use app\repository\ProductRepository;



class UserController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['authorisation', 'registration', 'logout', 'profile'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['authorisation', 'registration'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'profile'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionRegistration()
    {
        $this->view->title = 'Регистрация';

        $model = new RegistrationModel();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $userId = UserRepository::createUser(
                $model->phone,
                $model->password,
                $model->name,
                $model->surname
            );
            if ($userId) {
                Yii::$app->user->login(Users::findIdentity($userId));
                return $this->goHome();
            }
        }
        return $this->render('registration', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionAuthorisation()
    {
        $this->view->title = 'Вход';

        if(!Yii::$app->user->isGuest){
            $this->goHome();
        }

        $model = new AuthForm();
        if($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->goHome();
        }

        
        return $this->render('authorisation', ['model' => $model]);
    }

    public function actionProfile($id){
        $user = UserRepository::getUserById($id);
        $orders = OrdersRepository::getOrdersByUserId(Yii::$app->user->id);
        $products = ProductRepository::getAll();

        return $this->render('profile', ['user' => $user, 'orders' => $orders, 'products' => $products]);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
