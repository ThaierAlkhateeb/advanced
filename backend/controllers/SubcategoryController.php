<?php

namespace backend\controllers;

use Yii;
use backend\models\SubCategory;
use backend\models\SubCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * SubcategoryController implements the CRUD actions for SubCategory model.
 */
class SubcategoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SubCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SubCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SubCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SubCategory();

        if ($model->load(Yii::$app->request->post())) {
            $model->pic = UploadedFile::getInstance($model,'pic');
            if(!empty($model->pic)){
             $path = 'uploads/' .rand(). $model->pic->baseName . '.' . $model->pic->extension;
             $model->pic->saveAs($path);
             $model->pic = $path;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SubCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
       $model = $this->findModel($id);
        $oldPic = $model::find()->select('pic')->where("id=$id")->one();
        if ($model->load(Yii::$app->request->post()) ) {
            if(null !==(UploadedFile::getInstance($model, 'pic')) )
            {
             $model->pic = UploadedFile::getInstance($model, 'pic');
                   if(!empty($model->pic)){
                             $path = 'uploads/' .rand(). $model->pic->baseName . '.' . $model->pic->extension;
                             $model->pic->saveAs($path);
                             $model->pic = $path;
                         }
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,

            ]);
        }
    }

    /**
     * Deletes an existing SubCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       $model = $this->findModel($id);
            if(!empty($model->pic) && file_exists(Yii::$app->basePath.'/web/'.$model->pic))
                unlink(Yii::$app->basePath.'/web/'.$model->pic);
            $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SubCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SubCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SubCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
