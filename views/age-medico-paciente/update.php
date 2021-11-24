<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeMedicoPaciente */

$this->title = 'Update Age Medico Paciente: ' . $model->rel_id;
$this->params['breadcrumbs'][] = ['label' => 'Age Medico Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rel_id, 'url' => ['view', 'id' => $model->rel_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="age-medico-paciente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
