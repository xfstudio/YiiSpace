<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var admin\models\AdminMenu $model
 */

$this->title = 'Update Admin Menu: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Admin Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admin-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
