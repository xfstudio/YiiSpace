<?php
use yii\helpers\Html;

use year\foundation\FoundationAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
FoundationAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>



<div class="">
    <?= $content ;?>
</div>


<script>
    $(document).foundation();
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
