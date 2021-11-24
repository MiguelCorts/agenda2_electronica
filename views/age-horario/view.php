<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\AgeHorario */
$this->params['breadcrumbs'][] = ['label' => 'Age Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="age-horario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if(User::hasRole('Medico', $superAdminAllowed = true)){
          $ruta = "/age-medico/vistamedico";
          echo Html::a('Regresar', ['/age-medico/vistamedico'], ['class' => 'btn btn-success']);
          echo Html::a('Update', ['update', 'id' => $model->hor_id], ['class' => 'btn btn-primary']);
         
        } else if (User::hasRole('Paciente', $superAdminAllowed = true)){
           $ruta = "/age-paciente/vistapaciente";
        echo    Html::a('Regresar', ['/age-paciente/vistapaciente'], ['class' => 'btn btn-success']);
          }

          ?>
        <?php /*echo Html::a('Delete', ['delete', 'id' => $model->hor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'hor_id',
            'hor_lunes_inicio',
            'hor_lunes_fin',
            'hor_martes_inicio',
            'hor_martes_fin',
            'hor_miercoles_inicio',
            'hor_miercoles_fin',
            'hor_jueves_inicio',
            'hor_jueves_fin',
            'hor_viernes_inicio',
            'hor_viernes_fin',
            'hor_sabado_inicio',
            'hor_sabado_fin',
            'hor_domingo_inicio',
            'hor_domingo_fin',
            'hor_fk_med_id',
        ],
    ]) ?>

</div>
