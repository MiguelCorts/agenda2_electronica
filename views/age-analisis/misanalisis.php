<?php


use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgeAnalisisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<h1>Mis Analisis</h1>
<br>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ana_id',
            'ana_tipo',
            [
                'attribute' => 'ana_ruta',
                'format' => 'raw',
                'value' => function ($model) {   
                   if ($model->ana_ruta!='')
                     return '<embed src="'.Yii::$app->homeUrl. $model->ana_ruta.'" type="application/pdf" width="250px" height="auto"/>'; else return 'no image';
                },
              ],
            'ana_fk_pac_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
