<?php

namespace app\controllers;

use Yii;
use app\models\AgeMedicoPaciente;
use app\models\AgeMedicoPacienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AgeMedicoPacienteController implements the CRUD actions for AgeMedicoPaciente model.
 */
class AgeMedicoPacienteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public $freeAccessActions = ['viewn'];
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
     * Lists all AgeMedicoPaciente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgeMedicoPacienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AgeMedicoPaciente model.
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
     * Creates a new AgeMedicoPaciente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AgeMedicoPaciente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rel_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AgeMedicoPaciente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rel_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AgeMedicoPaciente model.
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
     * Finds the AgeMedicoPaciente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgeMedicoPaciente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgeMedicoPaciente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionMispacientes($id)
    {
        //  $model = AgePaciente::find()->where(['pac_fk_user_id' => Yii::$app->user->identity->id])->one();
          $searchModel = new AgeMedicoPacienteSearch();
          $dataProvider = $searchModel->buscar(Yii::$app->request->queryParams,$id);
          $dataProvider2 = $searchModel->buscar(Yii::$app->request->queryParams,500);

        return $this->render('mispacientes',compact('searchModel','dataProvider','dataProvider2'));
    }
}
