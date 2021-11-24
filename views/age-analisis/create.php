<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeAnalisis */

$this->title = 'Create Age Analisis';
$this->params['breadcrumbs'][] = ['label' => 'Age Analises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-analisis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
