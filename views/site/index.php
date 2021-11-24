<?php

/* @var $this yii\web\View */
use slavkovrn\imagecarousel\ImageCarouselWidget;

$this->title = 'My Yii Application';
?>
<div id="mu-slider">
		<div class="mu-slide">
<?= ImageCarouselWidget::widget([
    'id' =>'image-carousel',    // unique id of widget
    'width' => 1200,             // width of widget container
    'height' => 300,            // height of widget container
    'img_width' => 600,         // width of central image
    'img_height' => 350,        // height of central image
    'images' => [               // images of carousel
        [
                'src' => '/plantilla2/images/ca1.jpg',
                'alt' => 'Image 1',
        ],
        [
                'src' => '/plantilla2/images/ca2.jpg',
                'alt' => 'image 2',
        ],
        [
                'src' => '/plantilla2/images/ca3.jpg',
                'alt' => 'image 3',
        ],
        [
                'src' => '/plantilla2/images/ca4.jpg',
                'alt' => 'image 4',
        ],
    ]
]) ?>
</div>
</div>
<section id="mu-about">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div>
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>¿Quienes Somos?</h2>
										<p>Somos un consultorio medico, con personal especializado que cuentan con una amplia y multidisiplinaria  experiencia </p>
									</div>
								</div>
							</div>
							<!-- Start Feature Content -->
							<div class="row">
								<div class="col-md-6">
									<div class="mu-about-left">
										<img class="" src="/plantilla2/images/medico1.jpg" alt="img">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mu-about-right">
										<ul>
											<li>
												<h3>Nuestra Mision </h3>
												<p>Satisfacer de manera eficaz y eficiente las necesidades de cuidado de salud de la comunidad.
                           Brindar a toda la comunidad la mejor atención medica basada en la evidencia científica y contenido ético, acompañando al paciente y su familia.</p>
											</li>
											<li>
												<h3>Nuestra Vision</h3>
												<p>Crear y sostener un sistema integral de salud privada, que ofrezca un espacio de crecimiento y desarrollo profesional enfocado en la excelencia y calidez en la asistencia al paciente y su familia.
                           Ser una Organización Modelo en Gestión y Asistencia en el cuidado de la Salud.</p>
											</li>
											<li>
												<h3>Nuestros Valores</h3>
												<p>Equidad, responsavilidad, Etica, Compromiso y Eficiencia</p>
											</li>
										</ul>
									</div>
								</div>
							</div>
              <br>
              <br>
							<!-- End Feature Content -->
						</div>
					</div>
				</div>
			</div>
		</section>
