<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var admin\models\AdminMenuSearch $searchModel
 */

$this->title = 'Admin Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Admin Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'root',
            'lft',
            'rgt',
            'level',
            // 'label',
            // 'url:url',
            // 'params:ntext',
            // 'ajaxoptions:ntext',
            // 'htmloptions:ntext',
            // 'is_visible',
            // 'uid',
            // 'group_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
