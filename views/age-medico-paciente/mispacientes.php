<?php
use app\models\AgePaciente;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


?>
<h1>Mis Pacientes</h1>
<br>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        //'rel_id',
      //  'rel_fk_pac_id',
        'nombre',
        'apellidop',
        'apellidom',
        'generob',
        'fecha',
        //'rel_fk_med_id',
      //  'rel_fecha_inicio',

      [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{view}'
 ],
    ],
]); ?>
