<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\Growl;
use webvimark\modules\UserManagement\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\AgeAnalisis */
$this->params['breadcrumbs'][] = ['label' => 'Age Analises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php if(User::hasRole('Medico', $superAdminAllowed = true)){
          $ruta = "/age-medico/vistamedico";
          echo Html::a('Regresar', ['/age-medico/vistamedico'], ['class' => 'btn btn-success']);
          echo Html::a('Update', ['update', 'id' => $model->ana_id], ['class' => 'btn btn-primary']);
          echo Html::a('Delete', ['delete', 'id' => $model->ana_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
        echo Html::a('ver pdf', ['ver-pdf', 'id' => $model->ana_id], ['class' => 'btn btn-primary']);
        } else if (User::hasRole('Paciente', $superAdminAllowed = true)){
           $ruta = "/age-paciente/vistapaciente";
        echo    Html::a('Regresar', ['/age-paciente/vistapaciente'], ['class' => 'btn btn-success']);
        echo Html::a('Update', ['update', 'id' => $model->ana_id], ['class' => 'btn btn-primary']);
        echo Html::a('Delete', ['delete', 'id' => $model->ana_id], [
          'class' => 'btn btn-danger',
          'data' => [
              'confirm' => 'Are you sure you want to delete this item?',
              'method' => 'post',
          ],
      ]);
      echo Html::a('ver pdf', ['ver-pdf', 'id' => $model->ana_id], ['class' => 'btn btn-primary']);
          }

          ?>
<?php

if($nuevo==1){
    
    echo Growl::widget([
        'type' => Growl::TYPE_SUCCESS,
        'title' => 'Registro exitoso',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => 'el regitro fue guardado exitosamente ',
        'showSeparator' => true,
        'delay' => 0,
        'pluginOptions' => [
            'showProgressbar' => true,
            'placement' => [
                'from' => 'top',
                'align' => 'right',
            ]
        ]
    ]);
}
?>
<div class="age-analisis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ana_id',
            'ana_tipo',
            [
                'attribute' => 'ana_ruta',
                'format' => 'raw',
                'value' => function ($model) {   
                   if ($model->ana_ruta!='')
                     return '<span class="glyphicon glyphicon-folder-open"></span>';
                },
              ],
        ],
    ]) ?>

</div>
<h3>Analisis</h3>
<center>
<embed src="<?=Yii::$app->homeUrl. $model->ana_ruta?>" type="application/pdf" width="700px" height="600px"/>

</center>
