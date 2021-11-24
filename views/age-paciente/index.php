<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgePacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Age Pacientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-paciente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Age Paciente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pac_id',
            'pac_nombre',
            'pac_apellido_paterno',
            'pac_apellido_materno',
            'pac_fecha_nacimiento',
            //'pac_tipo_sangre',
            //'pac_antecedentes:ntext',
            //'pac_genero_biologico',
            //'pac_genero',
            //'pac_estatura',
            //'pac_peso',
            //'pac_farmaco_alergico:ntext',
            //'pac_fk_user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
