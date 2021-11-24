<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgeAnalisisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Age Analises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-analisis-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Age Analisis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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


</div>
