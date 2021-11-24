<?php

use yii\helpers\Html;
use yii\grid\GridView;
?>
<h1>Citas Pendientes</h1>
<br>
<?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cit_id',
            //'cit_hora',
            'cit_motivo:ntext',
            //'cit_diagnostico:ntext',
            'estatus',
            //'cit_fk_medico_paciente',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
         ],
        ],
    ]); ?>

<h1>Citas Confirmadas</h1>
<br>
<?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cit_id',
            'cit_fecha',
            'cit_hora',
            'cit_motivo:ntext',
            'estatus',
            //'cit_fk_medico_paciente',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
         ],
        ],
    ]); ?>

<h1>Citas Finalizadas</h1>
<br>
<?= GridView::widget([
        'dataProvider' => $dataProvider3,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cit_id',
            'cit_fecha',
            'cit_hora',
            'cit_motivo:ntext',
            'cit_diagnostico:ntext',
            'estatus',
            //'cit_fk_medico_paciente',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
         ],
        ],
    ]); ?>