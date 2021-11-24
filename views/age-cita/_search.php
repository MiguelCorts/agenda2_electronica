<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgeCitaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-cita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cit_id') ?>

    <?= $form->field($model, 'cit_fecha') ?>

    <?= $form->field($model, 'cit_hora') ?>

    <?= $form->field($model, 'cit_motivo') ?>

    <?= $form->field($model, 'cit_diagnostico') ?>

    <?php // echo $form->field($model, 'cit_estatus') ?>

    <?php // echo $form->field($model, 'cit_fk_medico_paciente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
