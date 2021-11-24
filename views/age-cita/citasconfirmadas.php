<?php

use yii\helpers\Html;
use yii\grid\GridView;
?>
<h1>Citas Confirmadas</h1>
<br>
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
            [
                'attribute'=>'cit_estatus',
                'value'=>function($model){
                    return Html::a("Cambiar Estatus",['update', 'id'=>$model->cit_id],['class'=>'btn btn-info','style'=>'width:100%;']);
                    },
                'format'=>'raw',
                ],
            //'cit_fk_medico_paciente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

