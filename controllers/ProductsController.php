<?php

namespace app\controllers;
use app\entity\Products;
use app\repository\ProductRepository;
use Yii;
use yii\web\UploadedFile;

class ProductsController extends \yii\web\Controller
{
    

    /**
     * Lists all Categories models.
     *
     * @return string*
     * Displays a single Categories model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $product = ProductRepository::getProductById($id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'product' => $product
        ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Products();

        if (Yii::$app->request->isPost) {
            $model->load($this->request->post());
            $model->img = UploadedFile::getInstance($model, 'img');
            $model->img->saveAs("products_img/{$model->img->baseName}.{$model->img->extension}");
            $model->img2 = UploadedFile::getInstance($model, 'img2');
            $model->img2->saveAs("products_img/{$model->img2->baseName}.{$model->img2->extension}");
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Categories model.
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
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
