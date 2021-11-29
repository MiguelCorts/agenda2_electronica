<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;
use kartik\mpdf\Pdf;
/* @var $this yii\web\View */
/* @var $model app\models\AgeReceta */

$this->params['breadcrumbs'][] = ['label' => 'Age Recetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="age-receta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p> 
        <?php if(User::hasRole('Medico', $superAdminAllowed = true)){
          $ruta = "/age-medico/vistamedico";
          echo Html::a('Regresar', ['/age-medico/vistamedico'], ['class' => 'btn btn-success']);
          echo Html::a('Update', ['update', 'id' => $model->rec_id], ['class' => 'btn btn-primary']);
          echo Html::a('Delete', ['delete', 'id' => $model->rec_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
        
        } else if (User::hasRole('Paciente', $superAdminAllowed = true)){
           $ruta = "/age-paciente/vistapaciente";
        echo    Html::a('Regresar', ['/age-paciente/vistapaciente'], ['class' => 'btn btn-success']);
      /*  echo Html::a('<i class="fa far fa-hand-point-up"></i> Generar pdf', ['/age-receta/privacy'], [
            'class'=>'btn btn-danger',
            'target'=>'_blank',
            'data-toggle'=>'tooltip',
            'title'=>'Will open the generated PDF file in a new window'
        ]);*/
          }

          ?>
       
        
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'rec_id',
            'rec_fecha',
            'rec_medicamentos:ntext',
            'rec_indicaciones:ntext',
        ],
    ]) ?>

</div>
