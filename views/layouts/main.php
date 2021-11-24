<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <meta charset="<?= Yii::$app->charset ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?= Html::csrfMetaTags() ?>
      <title><?= Html::encode($this->title) ?></title>
      <?php $this->head() ?>
  </head>

<body leftmargin="0" topmargin="0" onload="preloadImages();" marginheight="0" marginwidth="0">
<?php $this->beginBody() ?>

      <?php require_once('main_encabezado.php'); ?>
      <br>
      <br>
      <br>
      <?php //require_once('main_menu.php'); ?>
      <div class="container">
          <?= Breadcrumbs::widget([
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
          ]) ?>
          <?= Alert::widget() ?>
          <?= $content ?>
      </div>

  <br>
  <br>
  <br>
      <?php require_once('main_footer.php'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
