<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeMedico */

$this->title = 'Medico';
$this->params['breadcrumbs'][] = ['label' => 'Age Medicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->med_id, 'url' => ['view', 'id' => $model->med_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="age-medico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
