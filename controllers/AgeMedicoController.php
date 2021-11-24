<?php

namespace app\controllers;

use Yii;
use app\models\AgeMedico;
use app\models\AgeHorario;
use app\models\AgeMedicoSearch;
use app\models\AgePaciente;
use app\models\AgePacienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use webvimark\modules\UserManagement\models\User;

/**
 * AgeMedicoController implements the CRUD actions for AgeMedico model.
 */
class AgeMedicoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $freeAccessActions = ['medicos','viewn'];
    
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
     * Lists all AgeMedico models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgeMedicoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AgeMedico model.
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
    public function actionViewn($id,$nuevo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'nuevo' => $nuevo,
        ]);
    }

    /**
     * Creates a new AgeMedico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AgeMedico();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['viewn', 'id' => $model->med_id, 'nuevo'=> 1]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AgeMedico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          
            return $this->redirect(['viewn', 'id' => $model->med_id , 'nuevo'=> 1]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AgeMedico model.
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
     * Finds the AgeMedico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgeMedico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgeMedico::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionRegistrar()
    {
     $user  = new User();
     $model = new AgeMedico();

      if ($model->load(Yii::$app->request->post())&& $user->load(Yii::$app->request->post())) {

       // if ($model->validate() && $user->validate()) {
            $user->username = $user->email;
            $user->save();
            $user::assignRole($user->id, 'Medico');
            $model-> med_fk_user_id = $user['id'];
            $model-> med_estatus = "ACTIVO";
            $model->save();
            return $this->redirect(['viewn', 'id' => $model->med_id , 'nuevo'=> 1]);
      //  }else {
            // validation failed: $errors is an array containing error messages
       //     $model->errors;
       //     $user->errors;
       // }
        
      }

       return $this->render('registrar', [
           'model' => $model,
           'user'  => $user,
       ]);
    }
    public function actionVistamedico()
    {
        //  $model = AgePaciente::find()->where(['pac_fk_user_id' => Yii::$app->user->identity->id])->one();
          $model = AgeMedico::findOne(['med_fk_user_id' => Yii::$app->user->identity->id]);
          $model2 = AgeHorario::findOne(['hor_fk_med_id' => $model->med_id]);
          //  $searchModel = new AgePacienteSearch();
          //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
          return $this->render('vistamedico',compact('model','model2'));
    }
    public function actionMedicos()
    {   $medicos = AgeMedico::find()->where(['med_estatus'=>"ACTIVO"])->all();
        return $this->render('medicos',[
          'medicos'=>$medicos,
        ]);
    }
}
