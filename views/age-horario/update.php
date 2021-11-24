<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeHorario */

$this->params['breadcrumbs'][] = ['label' => 'Age Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hor_id, 'url' => ['view', 'id' => $model->hor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="age-horario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
