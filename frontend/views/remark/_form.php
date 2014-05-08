<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Remark $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="remark-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_date')->textInput() ?>

    <?php // $form->field($model, 'create_date')->textInput() ?>

    <?php // $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'significance')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 1024]) ?>

    <div class="form-group">
        <?= Html::a(Yii::t('Backend', 'Back'), ['index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('Backend', 'Create') : Yii::t('Backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
