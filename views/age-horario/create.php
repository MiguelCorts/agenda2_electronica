<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeHorario */

$this->title = 'Create Age Horario';
$this->params['breadcrumbs'][] = ['label' => 'Age Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-horario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
