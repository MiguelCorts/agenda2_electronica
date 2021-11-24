<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgeProcedimientoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-procedimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pro_id') ?>

    <?= $form->field($model, 'pro_tipo') ?>

    <?= $form->field($model, 'pro_fecha') ?>

    <?= $form->field($model, 'pro_hora') ?>

    <?= $form->field($model, 'pro_hospital') ?>

    <?php // echo $form->field($model, 'pro_sala') ?>

    <?php // echo $form->field($model, 'pro_pg_disponible') ?>

    <?php // echo $form->field($model, 'pro_descripcion') ?>

    <?php // echo $form->field($model, 'pro_consentimiento_ruta') ?>

    <?php // echo $form->field($model, 'pro_estatus') ?>

    <?php // echo $form->field($model, 'pro_fk_medico_paciente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
