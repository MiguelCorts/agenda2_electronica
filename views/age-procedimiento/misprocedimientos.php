<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>
<br>
<center>
<h1>Procedimientos Pendientes </h1>
<center>
<br>
<?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'pro_id',
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
<center>
<h1>Procedimientos Confirmados</h1>
</center>
<br>
<?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'pro_id',
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
<center>
<h1>Procedimientos Finalizados</h1>
</center>
<br>
<?= GridView::widget([
        'dataProvider' => $dataProvider3,
        'filterModel' => $searchModel3,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'pro_id',
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