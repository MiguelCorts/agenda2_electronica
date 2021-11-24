<?php

namespace app\controllers;

use Yii;
use app\models\AgeProcedimiento;
use app\models\AgeEstatus;
use app\models\AgeProcedimientoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use webvimark\modules\UserManagement\models\User;
/**
 * AgeProcedimientoController implements the CRUD actions for AgeProcedimiento model.
 */
class AgeProcedimientoController extends Controller
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
    /*public function behaviors()
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
     * Lists all AgeProcedimiento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgeProcedimientoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AgeProcedimiento model.
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
     * Creates a new AgeProcedimiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AgeProcedimiento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pro_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AgeProcedimiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {    $model3 = AgeEstatus::find()->all();
        $data =ArrayHelper::map($model3, 'est_id','est_nombre');
        $model = $this->findModel($id);
        $rutaoriginal = $model->pro_consentimiento_ruta;
        $hoy = date("Y-m-d");
        $hora = date('His');
        $fecha = $hoy."-".$hora;
        if ($model->load(Yii::$app->request->post())) {
            $ruta   = $model->pro_consentimiento_ruta;

            $fotito = UploadedFile::getInstance($model, 'pro_consentimiento_ruta');

            if (!is_null($fotito)) {

                $rutainicial = 'imagenes/procedimientos/';
                $nombre      = strtolower(str_replace(' ', '', $model->pro_tipo."-".$fecha));
                $ext         = explode('.', $fotito->name);
                $ext         = $ext[count($ext)-1];
                $rutadestino = $rutainicial.$nombre.'.'.$ext;

                if($fotito->saveAs($rutadestino)){
                    if(file_exists($rutaoriginal)){
                        unlink($rutaoriginal);
                    }
                    $model->pro_consentimiento_ruta= $rutadestino;
                }

            }else {
                //Si no cambiaremos la imagen asignamos el valor guardado anteriormente
                $model->pro_consentimiento_ruta = $ruta;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->pro_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'data'  => $data,
        ]);
    }

    /**
     * Deletes an existing AgeProcedimiento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $ruta="index";
        $model  = $this->findModel($id);
        //Eliminamos el archivo
        if(unlink($model->pro_consentimiento_ruta)){
            //Si el archivo se elimino exitosamente eliminamos el registro en la base de datos
            $model->delete();
        }
        if(User::hasRole('Medico', $superAdminAllowed = true)){
          $ruta = "/age-medico/vistamedico";
        } else if (User::hasRole('Paciente', $superAdminAllowed = true)){
           $ruta = "/age-paciente/vistapaciente";
          }
          return $this->redirect([$ruta]);
    }

    /**
     * Finds the AgeProcedimiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgeProcedimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgeProcedimiento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionCrear($id)
    {   $model3 = AgeEstatus::find()->all();
        $data =ArrayHelper::map($model3, 'est_id','est_nombre');
        $model = new AgeProcedimiento();
        $fecha  = date("Y-m-d-His");
        if ($model->load(Yii::$app->request->post())) {
            
            $ruta   = $model->pro_consentimiento_ruta;

            $fotito = UploadedFile::getInstance($model, 'pro_consentimiento_ruta');

            if (!is_null($fotito)) {
                $rutainicial = 'imagenes/procedimientos/';
                $nombre      = strtolower(str_replace(' ', '', $model->pro_tipo."-".$fecha));
                $ext         = explode('.', $fotito->name);
                $ext         = $ext[count($ext)-1];
                $rutadestino = $rutainicial.$nombre.'.'.$ext;

                if($fotito->saveAs($rutadestino)){
                    $model->pro_consentimiento_ruta= $rutadestino;
                }

            }else {
                //Si no cambiaremos la imagen asignamos el valor guardado anteriormente
                $model->pro_consentimiento_ruta = $ruta;
            }
            $model->pro_fk_medico_paciente=$id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->pro_id]);
        }

        return $this->render('crear', [
            'model' => $model,
            'data'  => $data,
        ]);
    }
    public function actionProcedimientospendientes($id)
    {   $model = new AgeProcedimiento();
        $searchModel = new AgeProcedimientoSearch();
        $dataProvider = $searchModel->buscar(Yii::$app->request->queryParams,$id,1);

        return $this->render('procedimientospendientes', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'model'        => $model,
        ]);
    }
    public function actionProcedimientosconfirmados($id)
    {   $model = new AgeProcedimiento();
        $searchModel = new AgeProcedimientoSearch();
        $dataProvider = $searchModel->buscar(Yii::$app->request->queryParams,$id,2);
        return $this->render('procedimientosconfirmados', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'model'        => $model,
        ]);
    }
    public function actionProcedimientosfinalizados($id)
    {   $model = new AgeProcedimiento();
        $searchModel = new AgeProcedimientoSearch();
        $dataProvider = $searchModel->buscar(Yii::$app->request->queryParams,$id,3);
        return $this->render('procedimientosfinalizados', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'model'        => $model,
        ]);
    }
    public function actionMisprocedimientos($id)
    {  
        $searchModel = new AgeProcedimientoSearch();
        $dataProvider1 = $searchModel->buscar2(Yii::$app->request->queryParams,$id,1);
        $dataProvider2 = $searchModel->buscar2(Yii::$app->request->queryParams,$id,2);
        $dataProvider3 = $searchModel->buscar2(Yii::$app->request->queryParams,$id,3);

        return $this->render('misprocedimientos', [
            'searchModel'  => $searchModel,
            'dataProvider1' => $dataProvider1,
            'dataProvider2' => $dataProvider2,
            'dataProvider3' => $dataProvider3,
        
        ]);
    }
}
