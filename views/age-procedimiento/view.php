<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\AgeProcedimiento */

$this->params['breadcrumbs'][] = ['label' => 'Age Procedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="age-procedimiento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if(User::hasRole('Medico', $superAdminAllowed = true)){
          $ruta = "/age-medico/vistamedico";
          echo Html::a('Regresar', ['/age-medico/vistamedico'], ['class' => 'btn btn-success']);
          echo Html::a('Update', ['update', 'id' => $model->pro_id], ['class' => 'btn btn-primary']);
          echo Html::a('Delete', ['delete', 'id' => $model->pro_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
        } else if (User::hasRole('Paciente', $superAdminAllowed = true)){
           $ruta = "/age-paciente/vistapaciente";
        echo    Html::a('Regresar', ['/age-paciente/vistapaciente'], ['class' => 'btn btn-success']);
          }

          ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pro_id',
            'pro_tipo',
            'pro_fecha',
            'pro_hora',
            'pro_hospital',
            'pro_sala',
            'pro_pg_disponible',
            'pro_descripcion:ntext',
           // 'pro_consentimiento_ruta',
            'estatus',
            //'pro_fk_medico_paciente',
        ],
    ]) ?>
<h3>Documento de Consentimiento</h3>
</div>
<center>
<embed src="<?=Yii::$app->homeUrl. $model->pro_consentimiento_ruta?>" type="application/pdf" width="700px" height="600px"/>

</center>