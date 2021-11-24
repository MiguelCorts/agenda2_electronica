<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeCita */

$this->title = 'Create Age Cita';
$this->params['breadcrumbs'][] = ['label' => 'Age Citas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-cita-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
