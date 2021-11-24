<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\AgeReceta */
/* @var $form yii\widgets\ActiveForm */
$hoy = date("Y-m-d");
?>

<div class="age-receta-form">

    <?php $form = ActiveForm::begin(); ?>
    <h1>Nueva Receta</h1>
    <br>
    <?= $form->field($model, 'rec_fecha')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => $hoy],
    'pluginOptions' => [

      'format' => 'yyyy/mm/dd',
        'autoclose'=>true
    ]
]); ?>

    <?= $form->field($model, 'rec_medicamentos')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rec_indicaciones')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
