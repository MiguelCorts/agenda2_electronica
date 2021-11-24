<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgeProcedimientoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Age Procedimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-procedimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Age Procedimiento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pro_id',
            'pro_tipo',
            'pro_fecha',
            'pro_hora',
            'pro_hospital',
            //'pro_sala',
            //'pro_pg_disponible',
            //'pro_descripcion:ntext',
            //'pro_consentimiento_ruta',
            //'pro_estatus',
            //'pro_fk_medico_paciente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
