<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var admin\models\AdminMenu $model
 */

$this->title = 'Create Admin Menu';
$this->params['breadcrumbs'][] = ['label' => 'Admin Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
