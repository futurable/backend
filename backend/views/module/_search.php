<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ModuleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ir-module-module-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'type' => ActiveForm::TYPE_INLINE
    ]); ?>

    <?= $form->field($model, 'state') ?>
    <?= $form->field($model, 'write_date') ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'category') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('Backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php // Html::resetButton(Yii::t('Backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
