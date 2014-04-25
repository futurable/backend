<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\LoginForm $model
 */
$this->title = Yii::t('Backend', 'Login');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
