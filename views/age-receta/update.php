<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeReceta */

$this->title = 'Update Age Receta: ' . $model->rec_id;
$this->params['breadcrumbs'][] = ['label' => 'Age Recetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rec_id, 'url' => ['view', 'id' => $model->rec_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="age-receta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
