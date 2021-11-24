<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeMedico */

$this->title = 'Create Age Medico';
$this->params['breadcrumbs'][] = ['label' => 'Age Medicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-medico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
