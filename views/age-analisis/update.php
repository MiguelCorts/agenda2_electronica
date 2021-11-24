<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeAnalisis */

$this->title = 'Update Age Analisis: ' . $model->ana_id;
$this->params['breadcrumbs'][] = ['label' => 'Age Analises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ana_id, 'url' => ['view', 'id' => $model->ana_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="age-analisis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
