<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var admin\models\AdminMenu $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="admin-menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'root')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'lft')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'rgt')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'is_visible')->textInput() ?>

    <?= $form->field($model, 'uid')->textInput() ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'params')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ajaxoptions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'htmloptions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'group_code')->textInput(['maxlength' => 25]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
