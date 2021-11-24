<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgeRecetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Age Recetas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-receta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Age Receta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rec_id',
            'rec_fecha',
            'rec_medicamentos:ntext',
            'rec_indicaciones:ntext',
            'rec_fk_medico_paciente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
