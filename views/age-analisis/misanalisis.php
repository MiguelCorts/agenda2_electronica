<?php


use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgeAnalisisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<!-- Start from blog -->
       <br>
       <br>
       <br>
       <br>
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>Analisis</h2>
										<p>Pude visualizar el analisis de forma completa pulsando sobre el  boton ver pdf, asegurese de subir los archivos correctos ya que de lo contrario el medico no podra valorarlo</p>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mu-from-blog-content">
										<div class="row">
										<?php foreach ($dataProvider->getModels() as $mode => $mod){?>
											<div class="col-md-4">
												<article class="mu-blog-item">
												<a href="#"><embed src="<?=Yii::$app->homeUrl.$mod->ana_ruta?>" type="application/pdf" width="100%" height="220px"/></a>
													<div class="mu-blog-item-content">
													<center>	<h2 class="mu-blog-item-title"><a href="#"><FONT SIZE=5>Analisis de </a> <?= $mod->ana_tipo?> </Font></h2></center>
                                                     <p><FONT SIZE=3><b>Nombre: </b> <?= $mod->nombre?> <?= $mod->apellidop?> <?= $mod->apellidom?> </Font></p>
                                                     <p><FONT SIZE=3><b>Peso: </b> <?= $mod->peso?> Kg. <b>Genero:</b> <?= $mod->genero?> </Font></p>
                                                     <p><FONT SIZE=3><b>Tipo de Sangre: </b> <?= $mod->tipo?>  <b>Estatura:</b> <?= $mod->estatura?> M. </Font></p>
													 <p><?= Html::a('Ver Pdf', ['/age-analisis/ver-pdf', 'id' => $mod->ana_id], ['class' => 'btn btn-success']) ?> 
													    <?= Html::a('Borrar', ['/age-analisis/delete', 'id' => $mod->ana_id], ['class' => 'btn btn-danger']) ?>
														<?= Html::a('Editar', ['/age-analisis/update', 'id' => $mod->ana_id], ['class' => 'btn btn-primary']) ?> </p>
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
					
		<!-- End from blog -->
   