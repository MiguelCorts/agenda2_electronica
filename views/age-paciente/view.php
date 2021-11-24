<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\Growl;
/* @var $this yii\web\View */
/* @var $model app\models\AgePaciente */
use webvimark\modules\UserManagement\models\User;

$this->params['breadcrumbs'][] = ['label' => 'Age Pacientes', 'url' => ['index']];
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
<div class="age-paciente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if(User::hasRole('Medico', $superAdminAllowed = true)){
          $ruta = "/age-medico/vistamedico";
          echo Html::a('Regresar', ['/age-medico/vistamedico'], ['class' => 'btn btn-success']);
          echo Html::a('Update', ['update', 'id' => $model->pac_id], ['class' => 'btn btn-primary']);
          echo Html::a('Delete', ['delete', 'id' => $model->pac_id], [
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
<br>
<style type="text/css">
 #imagenes{
	width: 270px;
	height: 280px;
          }
</style>
  <center><img id="imagenes" src="<?='/'.$model->pac_fotoruta?>" alt="img"></center>
<br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pac_id',
            'pac_nombre',
            'pac_apellido_paterno',
            'pac_apellido_materno',
            'pac_fecha_nacimiento',
            'pac_tipo_sangre',
            'pac_antecedentes:ntext',
            'pac_genero_biologico',
            'pac_genero',
            'pac_estatura',
            'pac_peso',
            'pac_farmaco_alergico:ntext',
           // 'pac_fk_user_id',
        ],
    ]) ?>

</div>
