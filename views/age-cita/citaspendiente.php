<?php

use yii\helpers\Html;
use yii\grid\GridView;
?>
<h1>Citas Pendientes</h1>
<br>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cit_id',
            [
                'attribute'=>'cit_fecha',
                'value'=>function($model){
                    return Html::a("Establecer Fecha y Hora",['update', 'id'=>$model->cit_id],['class'=>'btn btn-info','style'=>'width:100%;']);
                    },
                'format'=>'raw',
                ],
            //'cit_hora',
            'cit_motivo:ntext',
            //'cit_diagnostico:ntext',
            'estatus',
            //'cit_fk_medico_paciente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

