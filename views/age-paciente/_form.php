<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\AgePaciente */
/* @var $form yii\widgets\ActiveForm */

$ESTATUS= ['A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','O+'=>'O+','O-'=>'O-','AB+'=>'AB+','AB-'=>'AB-'];
$generos =['MASCULINO'=>'MASCULINO','FEMENINO'=>'FEMENINO'];
?>

<div class="age-paciente-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="container">
         <div class="row"> 
           <div class="col-sm">
           <?= $form->field($model, 'pac_fotoruta')->widget(FileInput::classname(), [
        'pluginOptions' => [
        'showCaption' => false,
        'showRemove' => false,
        'showUpload' => false,
        'browseClass' => 'btn btn-primary btn-block',
        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        'browseLabel' =>  'Select Photo'
                   ],
        'options' => ['accept' => 'image/*'],
          ]);?>
           </div>
        </div>
        <div class="row"> 
           <div class="col-sm">
           <?= $form->field($model, 'pac_nombre')->textInput(['maxlength' => true]) ?>
           </div>
        </div>
        <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'pac_apellido_paterno')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'pac_apellido_materno')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'pac_fecha_nacimiento')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => ''],
    'pluginOptions' => [

      'format' => 'yyyy/mm/dd',
        'autoclose'=>true
    ]
     ]); ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'pac_genero_biologico')->widget(Select2::classname(), [
    'data' => $generos,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]) ?>

    </div>
    <div class="col-sm">
    <?= $form->field($model, 'pac_tipo_sangre')->widget(Select2::classname(), [
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
    <?= $form->field($model, 'pac_antecedentes')->textarea(['rows' => 6]) ?>
    </div>
     </div>
     <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'pac_genero')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'pac_estatura')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm">
    <?= $form->field($model, 'pac_peso')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
    <?= $form->field($model, 'pac_farmaco_alergico')->textarea(['rows' => 6]) ?>
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

    <?php // $form->field($model, 'pac_fk_user_id')->textInput() ?>

     

    <?php ActiveForm::end(); ?>

</div>
