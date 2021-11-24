<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgePaciente */

$this->title = 'Update Age Paciente: ' . $model->pac_id;
$this->params['breadcrumbs'][] = ['label' => 'Age Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pac_id, 'url' => ['view', 'id' => $model->pac_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="age-paciente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
