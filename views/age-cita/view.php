<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\AgeCita */

$this->params['breadcrumbs'][] = ['label' => 'Age Citas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="age-cita-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //echo Html::a('Update', ['update', 'id' => $model->cit_id], ['class' => 'btn btn-primary']) ?>
        <?php if(User::hasRole('Medico', $superAdminAllowed = true)){
          $ruta = "/age-medico/vistamedico";
          echo Html::a('Regresar', ['/age-medico/vistamedico'], ['class' => 'btn btn-success']);
          echo Html::a('Update', ['update', 'id' => $model->cit_id], ['class' => 'btn btn-primary']);
          echo Html::a('Delete', ['delete', 'id' => $model->cit_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
        } else if (User::hasRole('Paciente', $superAdminAllowed = true)){
           $ruta = "/age-paciente/vistapaciente";
        echo    Html::a('Regresar', ['/age-paciente/vistapaciente'], ['class' => 'btn btn-success']);
        echo    Html::a('Delete', ['delete', 'id' => $model->cit_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
          }

          ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cit_id',
            'cit_fecha',
            'cit_hora',
            'cit_motivo:ntext',
            'cit_diagnostico:ntext',
            'cit_estatus',
            'cit_fk_medico_paciente',
        ],
    ]) ?>

</div>
