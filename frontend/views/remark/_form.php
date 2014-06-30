<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use common\commands\CompanyDropdown;

/**
 * @var yii\web\View $this
 * @var common\models\Remark $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="remark-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>
    
    <?php $companyDrowdown = new CompanyDropdown(); ?>
    <?= $form->field($model, 'company_id')->dropDownList($companyDrowdown->getDropdown()) ?>
    
    <?= DatePicker::widget([
        'model' => $model,
            'attribute' => 'event_date',
            'options' => ['placeholder' => Yii::t('Backend', 'Event date')],
            'form' => $form,
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'autoclose' => true,
                'language' => yii::$app->session['lang'],
                'todayHighlight' => true,
            ],
    ]); ?>

    <?php $significance =  array_combine(range(-3,3), array_merge(range(-3,0),['+1','+2','+3'])) ?>
    <?= $form->field($model, 'significance')->dropDownList( $significance ); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 1024]) ?>

    <div class="form-group">
        <?= Html::a(Yii::t('Backend', 'Back'), ['index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('Backend', 'Create') : Yii::t('Backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
