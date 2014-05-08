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

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'significance')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 1024]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
