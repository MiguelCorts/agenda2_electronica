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
										<h2>Citas Asignadas</h2>
										<p>Estas citas ya estan confirmadas,favor de estar pendiente de la fecha y hora (se debe de estar 15 minutos antes)</p>
									</div>
								</div>
							</div>
							<!-- Start Team Content -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-team-content">
										<div class="row">

                                        <?php foreach ($dataProvider2->getModels() as $mode => $mod){?>
											<!-- start single item -->
											<div class="col-md-6">
												<div class="mu-single-team">
													<div class="mu-single-team-img">
														<img src="/plantilla2/images/calendarioAzul.png" alt="img">
													</div>
													<div class="mu-single-team-content">
														<h3>Dr.<?=$mod->nombremedico?> <?=$mod->apellidopmedico?> <?=$mod->apellidommedico?></h3>
														<span><b>Especialidad:</b> Pediatra</span>
														<p><b>Motivo: </b> <?= $mod->cit_motivo?></p>
                                                        <p><b>Fecha: </b><?=$mod->cit_fecha?> <b>Hora: </b> <?=$mod->cit_hora?></p>
                                                        
                                                        <p><?= Html::a('Ver', ['/age-cita/view', 'id' => $mod->cit_id], ['class' => 'btn btn-success']) ?></p>
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
									<?= LinkPager::widget(['pagination' => $dataProvider2->pagination,]);?>
										
							</center>
							<!-- End Team Content -->