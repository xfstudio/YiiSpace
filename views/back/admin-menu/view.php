<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var admin\models\AdminMenu $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Admin Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-menu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'root',
            'lft',
            'rgt',
            'level',
            'label',
            'url:url',
            'params:ntext',
            'ajaxoptions:ntext',
            'htmloptions:ntext',
            'is_visible',
            'uid',
            'group_code',
        ],
    ]) ?>

</div>
