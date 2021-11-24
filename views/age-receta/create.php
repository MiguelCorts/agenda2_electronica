<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeReceta */

$this->title = 'Create Age Receta';
$this->params['breadcrumbs'][] = ['label' => 'Age Recetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-receta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
