<?php

namespace app\controllers;

use Yii;
use app\models\AgeAnalisis;
use app\models\AgePaciente;
use app\models\AgeAnalisisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\helpers\Url;
use webvimark\modules\UserManagement\models\User;
/**
 * AgeAnalisisController implements the CRUD actions for AgeAnalisis model.
 */
class AgeAnalisisController extends Controller
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
     * Lists all AgeAnalisis models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgeAnalisisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AgeAnalisis model.
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
    {   // PRIMER
        return $this->render('view', [
            'model' => $this->findModel($id),
            'nuevo' => $nuevo,
        ]);
    }
    /**
     * Creates a new AgeAnalisis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   $model2 = new AgePaciente();
        $model  = new AgeAnalisis();
        $hoy    = date("Y-m-d");
        $hora   = date('His');
        $fecha  = $hoy."-".$hora;
        if ($model->load(Yii::$app->request->post())) {
            $ruta   = $model->ana_ruta;

            $fotito = UploadedFile::getInstance($model, 'ana_ruta');

            if (!is_null($fotito)) {
                $rutainicial = 'imagenes/analisis/';
                $nombre      = strtolower(str_replace(' ', '', $model->ana_tipo."-".$fecha));
                $ext         = explode('.', $fotito->name);
                $ext         = $ext[count($ext)-1];
                $rutadestino = $rutainicial.$nombre.'.'.$ext;

                if($fotito->saveAs($rutadestino)){
                    $model->ana_ruta= $rutadestino;
                }

            }else {
                //Si no cambiaremos la imagen asignamos el valor guardado anteriormente
                $model->ana_ruta = $ruta;
            }
            $model2 = AgePaciente::findOne(['pac_fk_user_id' => Yii::$app->user->identity->id]);
            $model->ana_fk_pac_id=$model2->pac_id;
            $model->save();
            return $this->redirect(['viewn', 'id' => $model->ana_id, 'nuevo'=>1]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AgeAnalisis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $rutaoriginal = $model->ana_ruta;
        $hoy = date("Y-m-d");
        $hora = date('His');
        $fecha = $hoy."-".$hora;
        if ($model->load(Yii::$app->request->post())) {
            $ruta   = $model->ana_ruta;

            $fotito = UploadedFile::getInstance($model, 'ana_ruta');

            if (!is_null($fotito)) {

                $rutainicial = 'imagenes/analisis/';
                $nombre      = strtolower(str_replace(' ', '', $model->ana_tipo."-".$fecha));
                $ext         = explode('.', $fotito->name);
                $ext         = $ext[count($ext)-1];
                $rutadestino = $rutainicial.$nombre.'.'.$ext;

                if($fotito->saveAs($rutadestino)){
                    if(file_exists($rutaoriginal)){
                        unlink($rutaoriginal);
                    }
                    $model->ana_ruta= $rutadestino;
                }

            }else {
                //Si no cambiaremos la imagen asignamos el valor guardado anteriormente
                $model->ana_ruta = $ruta;
            }
            $model->save();
            return $this->redirect(['viewn', 'id' => $model->ana_id, 'nuevo'=>1]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AgeAnalisis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {   $ruta="index";
        $model  = $this->findModel($id);
        //Eliminamos el archivo
        if(unlink($model->ana_ruta)){
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
     * Finds the AgeAnalisis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgeAnalisis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgeAnalisis::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionVerPdf($id)
    {
        return $this->render('verpdf', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionMisanalisis($id)
    {
        $searchModel = new AgeAnalisisSearch();
        $dataProvider = $searchModel->buscar(Yii::$app->request->queryParams,$id);

        return $this->render('misanalisis', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
