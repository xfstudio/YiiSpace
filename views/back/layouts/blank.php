<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */

use year\startBootstrap\SBAdminV2;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
SBAdminV2::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

</head>
<body>

<?php $this->beginBody() ?>

<div id="wrapper">

<div id="page-wrapper">
        <?= $content ?>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
