<?php

use yii\helpers\Html;
use yii\grid\GridView;
?>
<h1>Mis recetas</h1>
<br>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'rec_fecha',
            'rec_medicamentos:ntext',
            'rec_indicaciones:ntext',
            'relacion',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}',
         ],
        ],
    ]); ?>
