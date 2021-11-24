<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgePacienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-paciente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pac_id') ?>

    <?= $form->field($model, 'pac_nombre') ?>

    <?= $form->field($model, 'pac_apellido_paterno') ?>

    <?= $form->field($model, 'pac_apellido_materno') ?>

    <?= $form->field($model, 'pac_fecha_nacimiento') ?>

    <?php // echo $form->field($model, 'pac_tipo_sangre') ?>

    <?php // echo $form->field($model, 'pac_antecedentes') ?>

    <?php // echo $form->field($model, 'pac_genero_biologico') ?>

    <?php // echo $form->field($model, 'pac_genero') ?>

    <?php // echo $form->field($model, 'pac_estatura') ?>

    <?php // echo $form->field($model, 'pac_peso') ?>

    <?php // echo $form->field($model, 'pac_farmaco_alergico') ?>

    <?php // echo $form->field($model, 'pac_fk_user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
