<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgeMedicoPaciente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-medico-paciente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rel_fk_pac_id')->textInput() ?>

    <?= $form->field($model, 'rel_fk_med_id')->textInput() ?>

    <?= $form->field($model, 'rel_fecha_inicio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
