<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\AgeMedico */
/* @var $form yii\widgets\ActiveForm */
$ESTATUS = ['ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO'];
$hoy = date("Y-m-d");
?>

<div class="age-medico-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'med_nombre')->textInput(['maxlength' => true]) ?>
    </div>
  </div>

  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'med_apellido_paterno')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'med_apellido_materno')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'med_fecha_nacimiento')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => $hoy],
    'pluginOptions' => [

      'format' => 'yyyy/mm/dd',
        'autoclose'=>true
    ]
]); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'med_cedula')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'med_especialidad')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'med_estatus')->widget(Select2::classname(), [
    'data' => $ESTATUS,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
  </div>
</div>
    <?php  //echo $form->field($model, 'med_fk_user_id')->textInput() ?>

    

    <?php ActiveForm::end(); ?>

</div>
