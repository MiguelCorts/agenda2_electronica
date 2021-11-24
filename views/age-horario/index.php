<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgeHorarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Age Horarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-horario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Age Horario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hor_id',
            'hor_lunes_inicio',
            'hor_lunes_fin',
            'hor_martes_inicio',
            'hor_martes_fin',
            //'hor_miercoles_inicio',
            //'hor_miercoles_fin',
            //'hor_jueves_inicio',
            //'hor_jueves_fin',
            //'hor_viernes_inicio',
            //'hor_viernes_fin',
            //'hor_sabado_inicio',
            //'hor_sabado_fin',
            //'hor_domingo_inicio',
            //'hor_domingo_fin',
            //'hor_fk_med_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
