<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgeCitaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Age Citas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-cita-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Age Cita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cit_id',
            'cit_fecha',
            'cit_hora',
            'cit_motivo:ntext',
            'cit_diagnostico:ntext',
            //'cit_estatus',
            //'cit_fk_medico_paciente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
