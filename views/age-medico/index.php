<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgeMedicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Age Medicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-medico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Age Medico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'med_id',
            'med_nombre',
            'med_apellido_paterno',
            'med_apellido_materno',
            'med_fecha_nacimiento',
            //'med_cedula',
            //'med_especialidad',
            //'med_estatus',
            //'med_fk_user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
