<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\bs4dropdown\ButtonDropdown;
/* @var $this yii\web\View */
/* @var $model app\models\AgeMedicoPaciente */

//$this->title = $model->rel_id;
$this->params['breadcrumbs'][] = ['label' => 'Age Medico Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="age-medico-paciente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php // echo Html::a('Update', ['update', 'id' => $model->rel_id], ['class' => 'btn btn-primary']) ?>
        <?php /*echo Html::a('Delete', ['delete', 'id' => $model->rel_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
        <?= Html::a('Regresar', ['/age-medico/vistamedico'], ['class' => 'btn btn-success']);?>
        <?=ButtonDropdown::widget([
            'label' => 'Recetas', 
            'dropdown' => [
            'items' => [
             ['label' => 'Agregar Receta', 'url' => '/age-receta/crear?id='.$model->rel_id],
             ['label' => 'Ver Recetas', 'url' => '/age-receta/misrecetas?id='.$model->rel_fk_pac_id],
                 '<div class="dropdown-divider"></div>',
                 ],
             ],
             'buttonOptions' => ['class' => 'btn btn-primary']
          ]); 
        ?>
          <?= Html::a('Ver Analisis', ['/age-analisis/misanalisis', 'id' => $model->rel_fk_pac_id], ['class' => 'btn btn-primary']) ?>
          
          <?= Html::a('Nuevo Procedimiento', ['/age-procedimiento/crear', 'id' => $model->rel_id], ['class' => 'btn btn-primary']) ?>
    </p>
    <br>
<style type="text/css">
 #imagenes{
	width: 270px;
	height: 280px;
          }
</style>
  <center><img id="imagenes" src="<?='/'.$model->foto?>" alt="img"></center>
<br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'rel_id',
          //  'rel_fk_pac_id',
          //  'rel_fk_med_id',
          //  'rel_fecha_inicio',
          'nombre',
          'apellidop',
          'apellidom',
          'generob',
          'fecha',
          'peso',
          'estatura',
          'tipo',
          'alergico',
          'antecedentes'
        ],
    ]) ?>

</div>
