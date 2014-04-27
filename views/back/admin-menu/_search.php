<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var admin\models\AdminMenuSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="admin-menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'root') ?>

    <?= $form->field($model, 'lft') ?>

    <?= $form->field($model, 'rgt') ?>

    <?= $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'label') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'params') ?>

    <?php // echo $form->field($model, 'ajaxoptions') ?>

    <?php // echo $form->field($model, 'htmloptions') ?>

    <?php // echo $form->field($model, 'is_visible') ?>

    <?php // echo $form->field($model, 'uid') ?>

    <?php // echo $form->field($model, 'group_code') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
