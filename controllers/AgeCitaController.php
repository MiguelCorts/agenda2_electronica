<?php

namespace app\controllers;

use Yii;
use app\models\AgeCita;
use app\models\AgeCitaSearch;
use app\models\AgeMedicoPaciente;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\AgeMedico;
use app\models\AgePaciente;
use app\models\AgeEstatus;
use webvimark\modules\UserManagement\models\User;
/**
 * AgeCitaController implements the CRUD actions for AgeCita model.
 */
class AgeCitaController extends Controller
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
     * Lists all AgeCita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgeCitaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AgeCita model.
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
     * Creates a new AgeCita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AgeCita();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cit_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AgeCita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {   $model3 = AgeEstatus::find()->all();
        $data =ArrayHelper::map($model3, 'est_id','est_nombre');
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $paciente = AgeMedicoPaciente::findOne($model->cit_fk_medico_paciente);
            $correos = $paciente->email;
            Yii::$app->mailer->compose('layouts/html')
            ->setFrom('consultoriomedico@agendaelectronica.tk')
            ->setTo($correos)
            ->setSubject('Cita')
            ->send(); 
            return $this->redirect(['view', 'id' => $model->cit_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'data'  =>$data,
        ]);
    }

    /**
     * Deletes an existing AgeCita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $ruta="index";
        $this->findModel($id)->delete();
        if(User::hasRole('Medico', $superAdminAllowed = true)){
          $ruta = "/age-medico/vistamedico";
        } else if (User::hasRole('Paciente', $superAdminAllowed = true)){
           $ruta = "/age-paciente/vistapaciente";
          }
          return $this->redirect([$ruta]);
    }

    /**
     * Finds the AgeCita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgeCita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgeCita::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
 
    public function actionSolicitar()
    {
        $model = new AgeCita();
    $rel   = new AgeMedicoPaciente();
    $model3 = AgeMedico::find()->where(['med_estatus'=>"ACTIVO"])->all();
    $data =ArrayHelper::map($model3, 'med_id','med_nombre');
 
    $hoy = date("Y-m-d");

    if ($model->load(Yii::$app->request->post())) {
        $busuario = AgePaciente::find()->where(['pac_fk_user_id' => Yii::$app->user->identity->id])->one();
        $rel= AgeMedicoPaciente::find()->where(['rel_fk_pac_id' =>$busuario['pac_id'],'rel_fk_med_id'=>$model['cit_fk_medico_paciente']])->one();
        if(!empty($rel)){
            $model-> cit_fk_medico_paciente = $rel['rel_id'];
            $model-> cit_estatus = 1;
            $model->save();
            return $this->redirect(['view', 'id' => $model->cit_id]);
        }else{
            $model2 = new AgeMedicoPaciente();
    $model2-> rel_fk_pac_id = $busuario['pac_id'];
    $model2-> rel_fk_med_id = $model['cit_fk_medico_paciente'];
    $model2-> rel_fecha_inicio = $hoy;
    $model2->save();
    $model-> cit_fk_medico_paciente = $model2['rel_id'];
    $model-> cit_estatus = 1;
    $model->save();
    return $this->redirect(['view', 'id' => $model->cit_id]);
        }
    }
        return $this->render('solicitar', [
            'model' => $model,
            'data'  => $data,
        ]);
    }

    public function actionCitaspendiente($id)
    {   $model = AgeCita::find()->all();
        $searchModel = new AgeCitaSearch();
        $dataProvider = $searchModel->buscar(Yii::$app->request->queryParams,$id,"1");

        return $this->render('citaspendiente', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'        => $model,
        ]);
    }
    public function actionCitasconfirmadas($id)
    {   $model = AgeCita::find()->all();
        $searchModel = new AgeCitaSearch();
        $dataProvider = $searchModel->buscar(Yii::$app->request->queryParams,$id,"2");

        return $this->render('citasconfirmadas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'        => $model,
        ]);
    }
    public function actionCitasfinalizadas($id)
    {   $model = AgeCita::find()->all();
        $searchModel = new AgeCitaSearch();
        $dataProvider = $searchModel->buscar(Yii::$app->request->queryParams,$id,"3");

        return $this->render('citasfinalizadas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'        => $model,
        ]);
    }
    public function actionMiscitas($id)
    {   $model = AgeCita::find()->all();
        $searchModel1 = new AgeCitaSearch();
        $dataProvider1 = $searchModel1->buscar2(Yii::$app->request->queryParams,$id,"1");

        $searchModel2 = new AgeCitaSearch();
        $dataProvider2 = $searchModel2->buscar2(Yii::$app->request->queryParams,$id,"2");

        $searchModel3 = new AgeCitaSearch();
        $dataProvider3 = $searchModel3->buscar2(Yii::$app->request->queryParams,$id,"3");

        return $this->render('miscitas', [
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
            'model'        => $model,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
            'searchModel3' => $searchModel3,
            'dataProvider3' => $dataProvider3,
        ]);
    }
}




    

    