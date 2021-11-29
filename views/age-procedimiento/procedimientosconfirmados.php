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
										<h2>Procedimientos Confirmados</h2>
										<p>Estos procedimientos estan confirmados y autorizados por el paciente </p>
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
														<p><b>Tipo: </b> <?= $mod->pro_tipo?></p>
                                                        <p><b>Hospital: </b> <?= $mod->pro_hospital?></p>
                                                        <p><b>Fecha: </b><?=$mod->pro_fecha?> <b>Hora: </b> <?=$mod->pro_hora?></p>
                                                        
                                                        <p><?= Html::a('Ver', ['/age-procedimiento/view', 'id' => $mod->pro_id], ['class' => 'btn btn-success']) ?> 
                                                        <?= Html::a('Editar', ['/age-procedimiento/update', 'id' => $mod->pro_id], ['class' => 'btn btn-primary']) ?>
                                                        <?= Html::a('Eliminar', ['/age-procedimiento/delete', 'id' => $mod->pro_id], ['class' => 'btn btn-danger']) ?> </p>
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
					