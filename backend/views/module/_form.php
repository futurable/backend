<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IrModuleModule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ir-module-module-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'create_uid')->textInput() ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'write_date')->textInput() ?>

    <?= $form->field($model, 'write_uid')->textInput() ?>

    <?= $form->field($model, 'website')->textInput() ?>

    <?= $form->field($model, 'summary')->textInput() ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'author')->textInput() ?>

    <?= $form->field($model, 'icon')->textInput() ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => 16]) ?>

    <?= $form->field($model, 'latest_version')->textInput() ?>

    <?= $form->field($model, 'shortdesc')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'application')->checkbox() ?>

    <?= $form->field($model, 'demo')->checkbox() ?>

    <?= $form->field($model, 'web')->checkbox() ?>

    <?= $form->field($model, 'license')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'sequence')->textInput() ?>

    <?= $form->field($model, 'auto_install')->checkbox() ?>

    <?= $form->field($model, 'menus_by_module')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'maintainer')->textInput() ?>

    <?= $form->field($model, 'contributors')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'views_by_module')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reports_by_module')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textInput() ?>

    <?= $form->field($model, 'published_version')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('Backend', 'Create') : Yii::t('Backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
