<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\AgeCita */
/* @var $form ActiveForm */
?>
<div class="solicitar">

    <?php $form = ActiveForm::begin(); ?>

       
        <?= $form->field($model, 'cit_motivo') ?>
        <?= $form->field($model, 'cit_fk_medico_paciente')->widget(Select2::classname(), [
    'data' => $data,
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]) ?>
       
    
        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- solicitar -->
