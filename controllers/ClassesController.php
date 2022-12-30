<?php

namespace app\controllers;

use app\models\Classes;
use app\models\ClassesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ClassesController implements the CRUD actions for Classes model.
 */
class ClassesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors(): array
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

    /**
     * Lists all Classes models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $searchModel = new ClassesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Classes model.
     * @param string $class_name Class Name
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(string $class_name): string
    {
        return $this->render('view', [
            'model' => $this->findModel($class_name),
        ]);
    }

    /**
     * Creates a new Classes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new Classes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'class_name' => $model->class_name]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Classes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $class_name Class Name
     * @return string|Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(string $class_name)
    {
        $model = $this->findModel($class_name);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'class_name' => $model->class_name]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Classes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $class_name Class Name
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(string $class_name): Response
    {
        $this->findModel($class_name)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Classes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $class_name Class Name
     * @return Classes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(string $class_name): Classes
    {
        if (($model = Classes::findOne(['class_name' => $class_name])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
