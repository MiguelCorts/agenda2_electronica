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
										<h2>Citas Confirmadas</h2>
										<p>Estas citas ya estan confirmadas, despues de concluirlas favor de relizar las notas del diagnostico</p>
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
														<img src="/plantilla2/images/calendarioAzul.png" alt="img">
													</div>
													<div class="mu-single-team-content">
													    <h3>Pac. <?=$mod->nombrep?> <?=$mod->apellidopp?> <?=$mod->apellidopm?></h3>
														<span><b>Genero: </b> <?= $mod->genero?></span>
														<p><b>Motivo: </b> <?= $mod->cit_motivo?></p>
                                                        <p><b>Fecha: </b><?=$mod->cit_fecha?> <b>Hora: </b> <?=$mod->cit_hora?></p>
                                                        
                                                        <p><?= Html::a('Ver', ['/age-cita/view', 'id' => $mod->cit_id], ['class' => 'btn btn-success']) ?>
                                                        <?= Html::a('Editar', ['/age-cita/update', 'id' => $mod->cit_id], ['class' => 'btn btn-primary']) ?>
                                                        <?= Html::a('Eliminar', ['/age-cita/delete', 'id' => $mod->cit_id], ['class' => 'btn btn-danger']) ?>
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
							<center>
									<?= LinkPager::widget(['pagination' => $dataProvider->pagination,]);?>
										
							</center>
							<!-- End Team Content -->

