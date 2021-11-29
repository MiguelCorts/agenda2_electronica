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
										<p>Estos procedimientos estan confirmados, favor de llegar con 3 horas de anticipacion al hospital para realizar los preparativos </p>
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
														<span><b>Especialidad: </b> <?= $mod->especialidad?></span>
														<p><b>Tipo: </b> <?= $mod->pro_tipo?></p>
                                                        <p><b>Hospital: </b> <?= $mod->pro_hospital?></p>
                                                        <p><b>Fecha: </b><?=$mod->pro_fecha?> <b>Hora: </b> <?=$mod->pro_hora?></p>
                                                        
                                                        <p><?= Html::a('Ver', ['/age-procedimiento/view', 'id' => $mod->pro_id], ['class' => 'btn btn-success']) ?></p>
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
					