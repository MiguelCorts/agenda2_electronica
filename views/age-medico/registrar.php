<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\AgeMedico */
/* @var $form ActiveForm */
$hoy = date("Y-m-d");                         // 03.10.01
?>
<div class="registrar">

    <?php $form = ActiveForm::begin(); ?>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'med_nombre') ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'med_apellido_paterno') ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'med_apellido_materno') ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'med_fecha_nacimiento')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => $hoy],
        'pluginOptions' => [

          'format' => 'yyyy/mm/dd',
            'autoclose'=>true
        ]
    ]); ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'med_cedula') ?>
    </div>
    <div class="col-sm">
    
    <?= $form->field($model, 'med_especialidad') ?>
    </div>
  </div>

  <div class="row">
    <div class="col-sm">
    <?= $form->field($user, 'email')->textInput(['maxlength' => 50, 'autocomplete'=>'off', 'autofocus'=>true]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($user, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($user, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off']) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
  </div>
</div>
        

       
    <?php ActiveForm::end(); ?>

</div><!-- registrar -->
