<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgeRecetaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-receta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rec_id') ?>

    <?= $form->field($model, 'rec_fecha') ?>

    <?= $form->field($model, 'rec_medicamentos') ?>

    <?= $form->field($model, 'rec_indicaciones') ?>

    <?= $form->field($model, 'rec_fk_medico_paciente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
