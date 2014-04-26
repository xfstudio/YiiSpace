<?php

use year\startBootstrap\SBAdminV2;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
SBAdminV2::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Start Bootstrap - SB Admin Version 2.0 Demo</title>


   <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody()  ?>
<div class="container">
   <?= $content  ?>
</div>

</body>
<?php $this->endBody()   ?>
</html>
<?php $this->endPage() ?>
