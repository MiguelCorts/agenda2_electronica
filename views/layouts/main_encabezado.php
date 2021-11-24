	<?php
use yii\helpers\Html;
use app\widgets\Alert;
use 	yii\bootstrap\Dropdown;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use webvimark\modules\UserManagement\models\User;
?>

<!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
    </a>
  <!-- END SCROLL TOP BUTTON -->

  	<!-- Start Header -->
	<header id="mu-hero">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light mu-navbar">
				<!-- Text based logo -->
				<a class="navbar-brand mu-logo" href="index.html"><span>AGENDA E.</span></a>
				<!-- image based logo -->
			   	<!-- <a class="navbar-brand mu-logo" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="fa fa-bars"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto mu-navbar-nav">
			      <li class="nav-item active">
			        <a href="/site/index">Home</a>
			      </li>
			      <li class="nav-item"><a href="/site/about">About</a></li>
			      <li class="nav-item"><a href="/age-medico/medicos">Medico</a></li>
			       <li class="nav-item dropdown">
				        <a class="dropdown-toggle" href="blog.html" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi perfil</a>
				       <div class="dropdown-menu" aria-labelledby="navbarDropdown">

					   
					   <?php if(User::hasRole('Paciente', $superAdminAllowed = true)){?>
							<a class="dropdown-item" href="/age-paciente/vistapaciente">Paciente</a>
						<?php  } else if (User::hasRole('Medico', $superAdminAllowed = true)){?>
							<a class="dropdown-item" href="/age-medico/vistamedico">Medico</a>
						<?php	}   ?>
				        </div>
				    </li>
			        <li class="nav-item"><a href="/age-paciente/registrar">Registrarse</a></li>

					<li class="nav-item">	<?php  echo Nav::widget([
				        'options' => ['class' => 'navbar-nav navbar-right'],
				        'items' => [

				            Yii::$app->user->isGuest ? (
				                ['label' => 'Login', 'url' => ['/user-management/auth/login']]
				            ) : (
				                '<li>'
				                . Html::beginForm(['/user-management/auth/logout'], 'post')
				                . Html::submitButton(
				                    'Logout (' . Yii::$app->user->identity->username . ')',
				                    ['class' => 'btn btn-link logout']
				                )
				                . Html::endForm()
				                . '</li>'
				            )
				        ],
				    ]);?></li>
			    </ul>
			  </div>
			</nav>
		</div>
	</header>
	<!-- End Header -->
