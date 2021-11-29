<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
?>
                        <br>
                        <br>
                        <br>
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>Mis recetas</h2>
										<p>En esta seccion puede consulatar las indicaciones del medico favor de leerlas cuidadosamente</p>
									</div>
								</div>
							</div>
							<!-- Start Team Content -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-team-content">
										<div class="row">

                                        <?php foreach ($dataProvider->getModels() as $mode => $mod){?>
											<!-- start single item -->
											<div class="col-md-6">
												<div class="mu-single-team">
													<div class="mu-single-team-img">
														<img src="/plantilla2/images/receta.png" alt="img">
													</div>
													<div class="mu-single-team-content">
														<h3>Dr.<?=$mod->nombremedico?> <?=$mod->apellidopmedico?> <?=$mod->apellidommedico?></h3>
														<span><b>Especialidad: </b> <?= $mod->especialidad?></span>
                                                        <p><b>Fecha: </b><?=$mod->rec_fecha?> </p>
                                                        <p><b>Medicamentos: </b> <?= $mod->rec_medicamentos?></p>
                                                        
                                                        
                                                        <p><?= Html::a('Ver', ['/age-receta/view', 'id' => $mod->rec_id], ['class' => 'btn btn-success']) ?> <?= Html::a('Eliminar', ['/age-receta/delete', 'id' => $mod->rec_id], ['class' => 'btn btn-danger']) ?></p>
													</div>
												</div>
											</div>
											<!-- End single item -->
                                            
                                            <?php }?>

										</div>
									</div>
								</div>
								
							</div>
							<center>
									<?= LinkPager::widget(['pagination' => $dataProvider->pagination,]);?>
										
							</center>
							<!-- End Team Content -->
