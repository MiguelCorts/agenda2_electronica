<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgeMedicoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-medico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'med_id') ?>

    <?= $form->field($model, 'med_nombre') ?>

    <?= $form->field($model, 'med_apellido_paterno') ?>

    <?= $form->field($model, 'med_apellido_materno') ?>

    <?= $form->field($model, 'med_fecha_nacimiento') ?>

    <?php // echo $form->field($model, 'med_cedula') ?>

    <?php // echo $form->field($model, 'med_especialidad') ?>

    <?php // echo $form->field($model, 'med_estatus') ?>

    <?php // echo $form->field($model, 'med_fk_user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
