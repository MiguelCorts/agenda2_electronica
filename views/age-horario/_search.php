<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgeHorarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-horario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'hor_id') ?>

    <?= $form->field($model, 'hor_lunes_inicio') ?>

    <?= $form->field($model, 'hor_lunes_fin') ?>

    <?= $form->field($model, 'hor_martes_inicio') ?>

    <?= $form->field($model, 'hor_martes_fin') ?>

    <?php // echo $form->field($model, 'hor_miercoles_inicio') ?>

    <?php // echo $form->field($model, 'hor_miercoles_fin') ?>

    <?php // echo $form->field($model, 'hor_jueves_inicio') ?>

    <?php // echo $form->field($model, 'hor_jueves_fin') ?>

    <?php // echo $form->field($model, 'hor_viernes_inicio') ?>

    <?php // echo $form->field($model, 'hor_viernes_fin') ?>

    <?php // echo $form->field($model, 'hor_sabado_inicio') ?>

    <?php // echo $form->field($model, 'hor_sabado_fin') ?>

    <?php // echo $form->field($model, 'hor_domingo_inicio') ?>

    <?php // echo $form->field($model, 'hor_domingo_fin') ?>

    <?php // echo $form->field($model, 'hor_fk_med_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
