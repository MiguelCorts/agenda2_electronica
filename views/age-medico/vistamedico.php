<?php
use app\models\AgePaciente;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use kartik\bs4dropdown\ButtonDropdown;
?>


<?php

//echo $model['pac_id'];
 ?>
 <h3>Datos del medico</h3>
 <br>
 <?php
// $model = new AgePaciente();
 //$model = AgePaciente::find()->where(['pac_fk_user_id' => Yii::$app->user->identity->id])->one();

 if(!empty($model['med_id'])){
      //$ruta="update?id=". $model['pac_id'];
      $ruta="update?id=". $model->med_id;
      $nombre="Actualizar datos";
 }
 else{
     $ruta="registrar";
     $nombre = "Ingresar datos";
  }
 if(!empty($model2['hor_id'])){
    $ruta2="/age-horario/update?id=".$model2->hor_id;
    $nombre2="Actualizar Horario";
 }else {
  $ruta2="/age-horario/create";
  $nombre2="Ingrese Horario";
 }
  ?>
  <?=ButtonDropdown::widget([
    'label' => 'Mis Citas', 
    'dropdown' => [
        'items' => [
            ['label' => 'Citas Pendientes de Asignar', 'url' => '/age-cita/citaspendiente?id='.$model->med_id],
            ['label' => 'Citas Confirmadas', 'url' => '/age-cita/citasconfirmadas?id='.$model->med_id],
            ['label' => 'Citas Finalizadas', 'url' => '/age-cita/citasfinalizadas?id='.$model->med_id],
            '<div class="dropdown-divider"></div>',
        ],
    ],
    'buttonOptions' => ['class' => 'btn btn-warning']
    ]); 
  ?>
  <?=ButtonDropdown::widget([
    'label' => 'Datos Personales', 
    'dropdown' => [
        'items' => [
            ['label' => $nombre, 'url' => $ruta],
            ['label' => $nombre2, 'url' => $ruta2],
            '<div class="dropdown-divider"></div>',
        ],
    ],
    'buttonOptions' => ['class' => 'btn btn-secondary']
    ]); 
  ?>
  <?=ButtonDropdown::widget([
    'label' => 'Procedimientos', 
    'dropdown' => [
        'items' => [
            ['label' => 'Procedimientos Pendientes', 'url' => '/age-procedimiento/procedimientospendientes?id='.$model->med_id],
            ['label' => 'Procedimientos Confirmados', 'url' => '/age-procedimiento/procedimientosconfirmados?id='.$model->med_id],
            ['label' => 'Procedimientos finalizados', 'url' => '/age-procedimiento/procedimientosfinalizados?id='.$model->med_id],
            '<div class="dropdown-divider"></div>',
        ],
    ],
    'buttonOptions' => ['class' => 'btn btn-primary']
    ]); 
  ?>
   <?= Html::a('Mis Pacientes', ['/age-medico-paciente/mispacientes', 'id' => $model->med_id], ['class' => 'btn btn-success']) ?>
   <?= Html::a('Registrar un Nuevo Medico', ['/age-medico/registrar'], ['class' => 'btn btn-danger']) ?>
   <?php //Html::a('Modificar datos', [$model->isNewRecord ? 'create' : 'update?id='.$model->pac_id], ['class' => 'btn btn-success']); ?>
  <br>
  <br>
 <?= !empty($model) ?
  DetailView::widget([
    'model' => $model,
    'attributes' => [
      //  'med_id',
        'med_nombre',
        'med_apellido_paterno',
        'med_apellido_materno',
        'med_fecha_nacimiento',
        'med_cedula',
        'med_especialidad',
        //'med_fk_user_id',
    ],
]) : "No hay datos" ?>

   <?php /*GridView::widget([
       'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
       'columns' => [
           ['class' => 'yii\grid\SerialColumn'],

           'pac_id',
         // 'pac_nombre',
         [
            'attribute'=>'pac_nombre',
            'value'=>function($model){
                    return Html::a($model->pac_nombre,['view', 'id'=>$model->pac_id],['class'=>'btn btn-info','style'=>'width:100%;']);
                },
            'format'=>'raw',
        ],
           'pac_apellido_paterno',
           'pac_apellido_materno',
           'pac_fecha_nacimiento',
           //'pac_tipo_sangre',
           //'pac_antecedentes:ntext',
           //'pac_sexo',
           //'pac_estatura',
           //'pac_peso',
           //'pac_fk_user_id',
           'username',

        //   ['class' => 'yii\grid\ActionColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{download} {view} {delete}',
            'buttons' => [
                'download' => function ($url) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-arrow-down"></span>',
                        $url,
                        [
                            'title' => 'Download',
                            'data-pjax' => '0',
                        ]
                    );
                },
            ],
     ],//fin de class yii\grid\ActionColumn',
       ],
   ]);*/ ?>



<br>
<br>
<br>
