<?php

namespace app\controllers;

use Yii;
use app\models\AgePaciente;
use app\models\AgePacienteSearch;
use app\models\AgeMedicoPaciente;
use app\models\AgeMedico;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use webvimark\modules\UserManagement\models\User;
/**
 * AgePacienteController implements the CRUD actions for AgePaciente model.
 */
class AgePacienteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $freeAccessActions = ['registrar','view','viewn'];
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
     * Lists all AgePaciente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgePacienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AgePaciente model.
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
     * Creates a new AgePaciente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AgePaciente();
        $model-> pac_fk_user_id = Yii::$app->user->identity->id;
        $hoy    = date("Y-m-d");
        $hora   = date('His');
        $fecha  = $hoy."-".$hora;
        if ($model->load(Yii::$app->request->post())) {
            $ruta   = $model->pac_fotoruta;

            $foto = UploadedFile::getInstance($model, 'pac_fotoruta');

            if (!is_null($foto)) {
                $rutainicial = 'imagenes/fotodeperfil/';
                $nombre      = strtolower(str_replace(' ', '',"-".$fecha));
                $ext         = explode('.', $foto->name);
                $ext         = $ext[count($ext)-1];
                $rutadestino = $rutainicial.$nombre.'.'.$ext;

                if($foto->saveAs($rutadestino)){
                    $model->pac_fotoruta= $rutadestino;
                }

            }else {
                //Si no cambiaremos la imagen asignamos el valor guardado anteriormente
                $model->pac_fotoruta = $ruta;
            }
            $model->save();
            return $this->redirect(['viewn', 'id' => $model->pac_id, 'nuevo'=> 1]);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AgePaciente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $rutaoriginal = $model->pac_fotoruta;
        $hoy = date("Y-m-d");
        $hora = date('His');
        $fecha = $hoy."-".$hora;
        if ($model->load(Yii::$app->request->post())) {
            $ruta   = $model->pac_fotoruta;

            $foto = UploadedFile::getInstance($model, 'pac_fotoruta');

            if (!is_null($foto)) {

                $rutainicial = 'imagenes/fotodeperfil/';
                $nombre      = strtolower(str_replace(' ', '',"-".$fecha));
                $ext         = explode('.', $foto->name);
                $ext         = $ext[count($ext)-1];
                $rutadestino = $rutainicial.$nombre.'.'.$ext;

                if($foto->saveAs($rutadestino)){
                    if(file_exists($rutaoriginal)){
                        unlink($rutaoriginal);
                    }
                    $model->pac_fotoruta= $rutadestino;
                }

            }else {
                //Si no cambiaremos la imagen asignamos el valor guardado anteriormente
                $model->pac_fotoruta = $ruta;
            }
            $model->save();
            return $this->redirect(['viewn', 'id' => $model->pac_id, 'nuevo'=> 1]);
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AgePaciente model.
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
     * Finds the AgePaciente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgePaciente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgePaciente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionVistapaciente()
    {
        //  $model = AgePaciente::find()->where(['pac_fk_user_id' => Yii::$app->user->identity->id])->one();
          $model = AgePaciente::findOne(['pac_fk_user_id' => Yii::$app->user->identity->id]);
        //  $searchModel = new AgePacienteSearch();
        //  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //  $relacion = new AgeMedicoPaciente();
        //  $data =ArrayHelper::map(AgeMedico::find()->all(), 'med_id','med_nombre');

        return $this->render('vistapaciente',compact('model'));
    }

    public function actionRegistrar()
    {
        $model = new AgePaciente();
        $user  = new User();
        $hoy    = date("Y-m-d");
        $hora   = date('His');
        $fecha  = $hoy."-".$hora;
        if ($model->load(Yii::$app->request->post())&& $user->load(Yii::$app->request->post())) {
            $ruta   = $model->pac_fotoruta;

            $foto = UploadedFile::getInstance($model, 'pac_fotoruta');

            if (!is_null($foto)) {
                $rutainicial = 'imagenes/fotodeperfil/';
                $nombre      = strtolower(str_replace(' ', '',"-".$fecha));
                $ext         = explode('.', $foto->name);
                $ext         = $ext[count($ext)-1];
                $rutadestino = $rutainicial.$nombre.'.'.$ext;

                if($foto->saveAs($rutadestino)){
                    $model->pac_fotoruta= $rutadestino;
                }

            }else {
                //Si no cambiaremos la imagen asignamos el valor guardado anteriormente
                $model->pac_fotoruta = $ruta;
            }
            $user->username = $user->email;
            $user->save();
            $user::assignRole($user->id, 'Paciente');
            $model-> pac_fk_user_id = $user['id'];
            $model->save();
            return $this->redirect(['viewn', 'id' => $model->pac_id,'nuevo'=>1]);
        }

     return $this->render('registrar', [
        'model'    => $model,
        'user'  => $user,
     ]);
    }
}
