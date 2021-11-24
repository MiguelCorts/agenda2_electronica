<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\TimePicker;
use kartik\date\DatePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\AgeCita */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="age-cita-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'cit_fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => ''],
    'pluginOptions' => [

      'format' => 'yyyy/mm/dd',
        'autoclose'=>true
    ]
     ]); ?>

    <?= $form->field($model, 'cit_hora')->widget(TimePicker::classname(),[
        'pluginOptions' => [
        'showSeconds' => true,
        'showMeridian' => false,
        'minuteStep' => 1,
        'secondStep' => 5,
    ]
      ]); ?>
    <?= $form->field($model, 'cit_motivo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cit_diagnostico')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cit_estatus')->widget(Select2::classname(), [
    'data' => $data,
    'options' => ['placeholder' => ''],
    'pluginOptions' => [
        'allowClear' => true
    ],
]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
