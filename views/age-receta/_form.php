<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AgeReceta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-receta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rec_fecha')->textInput() ?>

    <?= $form->field($model, 'rec_medicamentos')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rec_indicaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rec_fk_medico_paciente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
