

<?php
use app\models\AgePaciente;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use kartik\popover\PopoverX;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\bs4dropdown\ButtonDropdown;
?>


<?php

//echo $model['pac_id'];
 ?>
 <h3>Datos del páciente</h3>
 <br>
 <?php
// $model = new AgePaciente();
 //$model = AgePaciente::find()->where(['pac_fk_user_id' => Yii::$app->user->identity->id])->one();

 if(!empty($model['pac_id'])){
      //$ruta="update?id=". $model['pac_id'];
      $ruta="update?id=". $model->pac_id;
      $nombre="Actualizar datos";
 }
 else{
     $ruta="create";
     $nombre = "ingresar datos";
  }
  ?>
  <?=ButtonDropdown::widget([
    'label' => 'Analisis', 
    'dropdown' => [
        'items' => [
            ['label' => 'Mis Analisis', 'url' => '/age-analisis/misanalisis?id='.$model->pac_id],
            ['label' => 'Agregar Analisis', 'url' => '/age-analisis/create'],
            '<div class="dropdown-divider"></div>',
        ],
    ],
    'buttonOptions' => ['class' => 'btn btn-primary']
    ]); 
  ?>
  <?=ButtonDropdown::widget([
    'label' => 'Citas', 
    'dropdown' => [
        'items' => [
            ['label' => 'Nueva cita', 'url' => '/age-cita/solicitar'],
            ['label' => 'Mis Citas Pendientes ', 'url' => '/age-cita/miscitas?id='.$model->pac_id],
            ['label' => 'Mis Citas Confirmadas', 'url' => '/age-cita/miscitasc?id='.$model->pac_id],
            ['label' => 'Mis Citas Finalizadas', 'url' => '/age-cita/miscitasf?id='.$model->pac_id],
            '<div class="dropdown-divider"></div>',
        ],
    ],
    'buttonOptions' => ['class' => 'btn btn-warning']
    ]); 
  ?>
   <?=ButtonDropdown::widget([
    'label' => 'Mis procedimientos', 
    'dropdown' => [
        'items' => [
            ['label' => 'Mis Procedimientos Pendientes ', 'url' => '/age-procedimiento/misprocedimientos?id='.$model->pac_id],
            ['label' => 'Mis Procedimientos Confirmadas', 'url' => '/age-procedimiento/misprocedimientosc?id='.$model->pac_id],
            ['label' => 'Mis Procedimientos Finalizadas', 'url' => '/age-procedimiento/misprocedimientosf?id='.$model->pac_id],
            '<div class="dropdown-divider"></div>',
        ],
    ],
    'buttonOptions' => ['class' => 'btn btn-success']
    ]); 
  ?>
   <?= Html::a('Mis Recetas', ['/age-receta/misrecetas', 'id' => $model->pac_id], ['class' => 'btn btn-info']) ?>
   <?= Html::a($nombre, [$ruta], ['class' => 'btn btn-danger']) ?>
   <?php //Html::a('Modificar datos', [$model->isNewRecord ? 'create' : 'update?id='.$model->pac_id], ['class' => 'btn btn-success']); ?>
  <br>
  <br>
  <style type="text/css">
 #imagenes{
	width: 270px;
	height: 280px;
          }
</style>
  <center><img id="imagenes" src="<?='/'.$model->pac_fotoruta?>" alt="img"></center>
  <br>
 <?= !empty($model) ?
  DetailView::widget([
    'model' => $model,
    'attributes' => [
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
]) : "No hay datos" ?>


<br>
<br>
<br>
