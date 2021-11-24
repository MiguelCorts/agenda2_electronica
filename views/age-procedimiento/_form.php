<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\TimePicker;
use kartik\date\DatePicker;
use kartik\widgets\FileInput;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\AgeProcedimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-procedimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'pro_tipo')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'pro_fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => ''],
    'pluginOptions' => [

      'format' => 'yyyy/mm/dd',
        'autoclose'=>true
    ]
     ]); ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'pro_hora')->widget(TimePicker::classname(),[
        'pluginOptions' => [
        'showSeconds' => true,
        'showMeridian' => false,
        'minuteStep' => 1,
        'secondStep' => 5,
    ]
      ]); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'pro_hospital')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'pro_sala')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'pro_pg_disponible')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'pro_descripcion')->textarea(['rows' => 6]) ?>
    </div>
  </div>

  <div class="row">
    <div class="col-sm">
    <?=$form->field($model, 'pro_consentimiento_ruta')->widget(FileInput::classname(), [
    'options' => ['accept' => 'application/pdf'],
    ]); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'pro_estatus')->widget(Select2::classname(), [
    'data' => $data,
    'options' => ['placeholder' => ''],
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

    <?php //$form->field($model, 'pro_fk_medico_paciente')->textInput() ?>

    

    <?php ActiveForm::end(); ?>

</div>
