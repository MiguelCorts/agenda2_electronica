<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeProcedimiento */

$this->title = 'Create Age Procedimiento';
$this->params['breadcrumbs'][] = ['label' => 'Age Procedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-procedimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
