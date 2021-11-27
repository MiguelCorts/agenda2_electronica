<?php
use kartik\popover\PopoverX;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use app\models\AgeHorario;
use yii\widgets\DetailView;
use kartik\widgets\Growl;
 ?>

                             <div class="row">
								<div class="col-md-12">
									<div class="mu-team-content">
										<div class="row">

           <?php foreach ($medicos as $medico => $med){?>


                    	<!-- start single item -->
											<div class="col-md-6">
												<div class="mu-single-team">
													<div class="mu-single-team-img">
														<img src="/plantilla2/images/usuario1.png" alt="img">
													</div>
													<div class="mu-single-team-content">
                            <h3>Dr.<?= $med->med_nombre?> <?= $med->med_apellido_paterno?> <?= $med->med_apellido_materno?> </h3>
                            <p>Especialidad: <?=$med->med_especialidad ?></p>
                              <p>Fecha de Nacimiento: <?=$med->med_fecha_nacimiento ?></p>
                              <p>Cedula Profesional: <?=$med->med_cedula ?></p>
                              <?php
                              PopoverX::begin([
                               'placement' => PopoverX::ALIGN_RIGHT,
                               'toggleButton' => ['label'=>'Horario', 'class'=>'btn btn-default'],
                              'header' => '<h5>Horario</h5>',
                                   ]);
// form with an id used for action buttons in footer
                          $form = ActiveForm::begin(['fieldConfig'=>['showLabels'=>false], 'options' => ['id'=>'kv-login-form']]);
                           echo DetailView::widget([
                           'model' => $med,
                           'attributes' => [

                                  [
                                  'attribute'=>'lunes',
                                  'value'=>function($med){
                                          return $med->lunes." a ".$med->lunesf;
                                      },
                                  'format'=>'raw',
                                  ],
                                  [
                                  'attribute'=>'martes',
                                  'value'=>function($med){
                                          return $med->martes." a ".$med->martesf;
                                      },
                                  'format'=>'raw',
                                  ],
                                  [
                                  'attribute'=>'miercoles',
                                  'value'=>function($med){
                                          return $med->miercoles." a ".$med->miercolesf;
                                      },
                                  'format'=>'raw',
                                  ],
                                  [
                                  'attribute'=>'jueves',
                                  'value'=>function($med){
                                          return $med->jueves." a ".$med->juevesf;
                                      },
                                  'format'=>'raw',
                                  ],
                                  [
                                  'attribute'=>'viernes',
                                  'value'=>function($med){
                                          return $med->Viernes." a ".$med->viernesf;
                                      },
                                  'format'=>'raw',
                                  ],
                                  [
                                  'attribute'=>'sabado',
                                  'value'=>function($med){
                                          return $med->sabado." a ".$med->sabadof;
                                      },
                                  'format'=>'raw',
                                  ],
                                  [
                                  'attribute'=>'domingo',
                                  'value'=>function($med){
                                          return $med->domingo." a ".$med->domingof;
                                      },
                                  'format'=>'raw',
                                  ],
                           ],
                       ]);
                             ActiveForm::end();
                            PopoverX::end();

                               ?>
													</div>
												</div>
											</div>
											<!-- End single item -->
                    <?php }?>
											<!-- start single item -->

											<!-- End single item -->
										</div>
									</div>
								</div>

							</div>
							<!-- End Team Content -->
						</div>
					</div>
				</div>
			</div>
		</section>
