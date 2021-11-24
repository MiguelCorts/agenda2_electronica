<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgeMedicoPacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Age Medico Pacientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-medico-paciente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Age Medico Paciente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rel_id',
            'rel_fk_pac_id',
            'rel_fk_med_id',
            'rel_fecha_inicio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
