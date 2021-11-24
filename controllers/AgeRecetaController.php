<?php

namespace app\controllers;

use Yii;
use app\models\AgeReceta;
use app\models\AgeMedicoPaciente;
use app\models\AgeMedico;
use app\models\AgeRecetaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\helpers\Html;
use webvimark\modules\UserManagement\models\User;


/**
 * AgeRecetaController implements the CRUD actions for AgeReceta model.
 */
class AgeRecetaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $freeAccessActions = ['privacy','viewn'];
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
     * Lists all AgeReceta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgeRecetaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AgeReceta model.
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
     * Creates a new AgeReceta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AgeReceta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rec_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AgeReceta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rec_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AgeReceta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        if(User::hasRole('Medico', $superAdminAllowed = true)){
          $ruta = "/age-medico/vistamedico";
        } else if (User::hasRole('Paciente', $superAdminAllowed = true)){
           $ruta = "/age-paciente/vistapaciente";
          }
          return $this->redirect([$ruta]);
    }

    /**
     * Finds the AgeReceta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AgeReceta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AgeReceta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionReceta() {

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'destination' => Pdf::DEST_BROWSER,
            'content' => $this->renderPartial('receta'),
            'options' => [
                // any mpdf options you wish to set
            ],

        ]);
        return $pdf->render();
    }
public function actionCrear($id)
{
    $model = new AgeReceta();

    if ($model->load(Yii::$app->request->post())) {
        $model->rec_fk_medico_paciente = $id;
        $model->save();
        return $this->redirect(['view', 'id' => $model->rec_id]);
    }

    return $this->render('crear', [
        'model' => $model,
    ]);
}
public function actionMisrecetas($id)
    {
        $searchModel = new AgeRecetaSearch();
        $dataProvider = $searchModel->buscar(Yii::$app->request->queryParams,$id);

        return $this->render('misrecetas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionPrivacy() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'destination' => Pdf::DEST_BROWSER,
            'content' => $this->renderPartial('privacy'),
            'options' => [
                // any mpdf options you wish to set
            ],

        ]);
        return $pdf->render();
    }
}
