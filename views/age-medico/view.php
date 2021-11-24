<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\Growl;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\AgeMedico */

$this->params['breadcrumbs'][] = ['label' => 'Age Medicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<?php

if($nuevo==1){
    
    echo Growl::widget([
        'type' => Growl::TYPE_SUCCESS,
        'title' => 'Registro exitoso',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => 'el regitro fue guardado exitosamente ',
        'showSeparator' => true,
        'delay' => 0,
        'pluginOptions' => [
            'showProgressbar' => true,
            'placement' => [
                'from' => 'top',
                'align' => 'right',
            ]
        ]
    ]);
}
?>
<div class="age-medico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if(User::hasRole('Medico', $superAdminAllowed = true)){
          $ruta = "/age-medico/vistamedico";
          echo Html::a('Regresar', ['/age-medico/vistamedico'], ['class' => 'btn btn-success']);
          echo Html::a('Update', ['update', 'id' => $model->med_id], ['class' => 'btn btn-primary']);
          echo Html::a('Delete', ['delete', 'id' => $model->med_id], [
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
            'med_id',
            'med_nombre',
            'med_apellido_paterno',
            'med_apellido_materno',
            'med_fecha_nacimiento',
            'med_cedula',
            'med_especialidad',
            'med_estatus',
            'med_fk_user_id',
        ],
    ]) ?>

</div>
