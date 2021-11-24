<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AgeProcedimiento */

$this->title = 'Update Age Procedimiento: ' . $model->pro_id;
$this->params['breadcrumbs'][] = ['label' => 'Age Procedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pro_id, 'url' => ['view', 'id' => $model->pro_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="age-procedimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data'  => $data,
    ]) ?>

</div>
