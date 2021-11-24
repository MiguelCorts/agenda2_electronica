<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgePaciente */

$this->title = 'Create Age Paciente';
$this->params['breadcrumbs'][] = ['label' => 'Age Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-paciente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
