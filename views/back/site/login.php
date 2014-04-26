<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\LoginForm $model
 */
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => '', 'role' => 'form'],
                    'fieldConfig' => [
                        'template' => "<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        //   'template' => " {input}<div class=\"col-lg-8\">{error}</div>",
                        // 'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        'inputOptions'=>['class'=>'form-control']
                    ],
                ]); ?>

                <fieldset>
                    <div class="form-group">
                        <?= $form->field($model, 'username'
                            , array( 'inputOptions'=> array('placeholder'=>'用户名','class'=>'form-control') )
                        ) ?>
                    </div>

                    <div class="form-group">
                        <?= $form->field($model, 'password',
                            array( 'inputOptions'=> array('placeholder'=>'密码','class'=>'form-control'))
                        )->passwordInput() ?>
                    </div>

                    <div class="checkbox">
                        <label>
                            <?=
                            $form->field($model, 'rememberMe', [
                                'template' => " {input}\n<div class=\"col-lg-8\">{error}</div>",
                            ])->checkbox() ?>
                        </label>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-success btn-block', 'name' => 'login-button']) ?>
                    </div>

                </fieldset>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>