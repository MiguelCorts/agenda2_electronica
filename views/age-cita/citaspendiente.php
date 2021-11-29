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
										<h2>Citas Pendientes</h2>
										<p>Estas citas necesitan que asigne una fecha y hora </p>
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
														<img src="/plantilla2/images/calendarioAmarillo.png" alt="img">
													</div>
													<div class="mu-single-team-content">
													    <h3>Pac. <?=$mod->nombrep?> <?=$mod->apellidopp?> <?=$mod->apellidopm?></h3>
														<span><b>Genero: </b> <?= $mod->genero?></span>
														<p><b>Motivo: </b> <?= $mod->cit_motivo?></p>
                                                        <p><b>Fecha: </b> Pendiente <b>Hora: </b> Pendiente</p>
                                                        
                                                        <p><?= Html::a('Ver', ['/age-cita/view', 'id' => $mod->cit_id], ['class' => 'btn btn-success']) ?> 
                                                        <?= Html::a('Borrar', ['/age-cita/view', 'id' => $mod->cit_id], ['class' => 'btn btn-danger']) ?> 
                                                        <?= Html::a('Editar', ['/age-cita/update', 'id' => $mod->cit_id], ['class' => 'btn btn-primary']) ?>
                                                    </p>
													</div>
												</div>
											</div>
											<!-- End single item -->
                                            
                                            <?php }?>
									
										</div>
									</div>
								</div>
								
							</div>
							<!-- End Team Content -->
							<center>
									<?= LinkPager::widget(['pagination' => $dataProvider->pagination,]);?>
										
							</center>
                       
