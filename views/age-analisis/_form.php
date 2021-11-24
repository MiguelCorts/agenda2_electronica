<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\AgeAnalisis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="age-analisis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ana_tipo')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'ana_ruta')->widget(FileInput::classname(), [
    'options' => ['accept' => 'application/pdf'],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
