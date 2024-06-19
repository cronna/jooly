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
use app\repository\OrdersRepository;
use app\repository\ProductRepository;



class UserController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['authorisation', 'registration', 'logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['authorisation', 'registration'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
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
                $model->password
            );
            if ($userId) {
                SaleCardRepository::createCard($userId);
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
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['profile', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
