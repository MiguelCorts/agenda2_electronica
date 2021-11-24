<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>
<h1>Procedimientos Finalizados</h1>
<br>
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
            'estatus',
            //'pro_fk_medico_paciente',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
         ],
        ],
    ]); ?>