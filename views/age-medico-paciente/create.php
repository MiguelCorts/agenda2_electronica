<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeMedicoPaciente */

$this->title = 'Create Age Medico Paciente';
$this->params['breadcrumbs'][] = ['label' => 'Age Medico Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-medico-paciente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
