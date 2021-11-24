<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgeMedicoPacienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-medico-paciente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rel_id') ?>

    <?= $form->field($model, 'rel_fk_pac_id') ?>

    <?= $form->field($model, 'rel_fk_med_id') ?>

    <?= $form->field($model, 'rel_fecha_inicio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
