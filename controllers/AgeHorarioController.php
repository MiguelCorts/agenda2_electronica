<?php

namespace app\controllers;
/*  */
use Yii;
use app\models\AgeHorario;
use app\models\AgeMedico;
use app\models\AgeHorarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AgeHorarioController implements the CRUD actions for AgeHorario model.
 */ 
class AgeHorarioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
{
return [
'ghost-access'=> [
'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
],
];
}
   /* public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }*/

    /**
     * Lists all AgeHorario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgeHorarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AgeHorario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AgeHorario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    { $model2 = AgeMedico::findOne(['med_fk_user_id' => Yii::$app->user->identity->id]);
     $model3 = AgeHorario::findOne(['hor_fk_med_id' => $model2->med_id]);
        if(!isset($model3)){
           $model = new AgeHorario();
           if ($model->load(Yii::$app->request->post())) {
               $model->hor_fk_med_id = $model2->med_id;
               $model->save();
               return $this->redirect(['view', 'id' => $model->hor_id]);
          }
        return $this->render('create', [
            'model' => $model,
        ]);
      }
       return $this->redirect(['/age-medico/vistamedico']);
    }

    /**
     * Updates an existing AgeHorario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->hor_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AgeHorario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AgeHorario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgeHorario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgeHorario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
