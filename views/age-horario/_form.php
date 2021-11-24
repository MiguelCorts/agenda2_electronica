<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\TimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\AgeHorario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-horario-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="container">
      <div class="row">
        <div class="col-sm">
      <?= $form->field($model, 'hor_lunes_inicio')->widget(TimePicker::classname(),[
        'pluginOptions' => [
        'showSeconds' => true,
        'showMeridian' => false,
        'minuteStep' => 1,
        'secondStep' => 5,
    ]
      ]); ?>
        </div>
        <div class="col-sm">
          <?= $form->field($model, 'hor_lunes_fin')->widget(TimePicker::classname(), []); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
            <?= $form->field($model, 'hor_martes_inicio')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-sm">
            <?= $form->field($model, 'hor_martes_fin')->widget(TimePicker::classname(), []); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
            <?= $form->field($model, 'hor_miercoles_inicio')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-sm">
              <?= $form->field($model, 'hor_miercoles_fin')->widget(TimePicker::classname(), []); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
            <?= $form->field($model, 'hor_jueves_inicio')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-sm">
              <?= $form->field($model, 'hor_jueves_fin')->widget(TimePicker::classname(), []); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
            <?= $form->field($model, 'hor_viernes_inicio')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-sm">
              <?= $form->field($model, 'hor_viernes_fin')->widget(TimePicker::classname(), []); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
            <?= $form->field($model, 'hor_sabado_inicio')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-sm">
                <?= $form->field($model, 'hor_sabado_fin')->widget(TimePicker::classname(), []); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
            <?= $form->field($model, 'hor_domingo_inicio')->widget(TimePicker::classname(), []); ?>
        </div>
        <div class="col-sm">
            <?= $form->field($model, 'hor_domingo_fin')->widget(TimePicker::classname(), []); ?>
        </div>
      </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
