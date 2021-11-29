<?php
use app\models\AgePaciente;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\LinkPager;
$cars = array("Volvo", "BMW", "Toyota");

?>



       <br>
       <br>
       <br>
       <br>
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>Mis Pacientes </h2>
										<p>Bienvenido doctor le recordamos que para agregar recetas y procedimientos a sus pacientes los puedes hacer dando click en el boton ver </p>
									</div>
								</div>
							<div class="col-md-12">
								<div class="mu-from-blog-content">
                  <?= GridView::widget([
                   'dataProvider' => $dataProvider2,
                    'filterModel' => $searchModel,
                   'emptyText'   => false,
                   'columns' => [
               // ['class' => 'yii\grid\SerialColumn'],
  
              //'rel_id',
             //  'rel_fk_pac_id',
                  'nombre',
                  'apellidop',
            // 'apellidom',
                 'generob',
           //  'fecha',
           //'rel_fk_med_id',
          //  'rel_fecha_inicio',
          ],]);   ?>
										<div class="row">
										<?php foreach ($dataProvider->getModels() as $mode => $mod){?>
											<div class="col-md-4">
												<article class="mu-blog-item">
                        <img src="<?='/'.$mod->foto?>" width="100%" height="220px" alt="img">
													<div class="mu-blog-item-content">
													<center>	<h2 class="mu-blog-item-title"><a href="#"><FONT SIZE=5> Paciente </Font></h2></center>
                                                     <p><FONT SIZE=3><b>Nombre: </b> <?= $mod->nombre?> <?= $mod->apellidop?> <?= $mod->apellidom?> </Font></p>
                                                     <p><FONT SIZE=3><b>Peso: </b> <?= $mod->peso?> Kg. <b>Genero:</b> <?= $mod->generob?> </Font></p>
                                                     <p><FONT SIZE=3><b>Tipo de Sangre: </b> <?= $mod->tipo?>  <b>Estatura:</b> <?= $mod->estatura?> M. </Font></p>
													 <p><?= Html::a('Ver', ['/age-medico-paciente/view', 'id' => $mod->rel_id], ['class' => 'btn btn-success']) ?> </p>
													</div>
												</article>
											</div>
                                        <?php }?>
											</div>
										</div>
									</div>
								</div>
							</div>
                            <br>
                            <center>
		<?= LinkPager::widget(['pagination' => $dataProvider->pagination,]);?>	
							</center>
					