<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\ModuleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ir-module-module-search">

    <?php
        // The controller action that will render the list
        $url = \yii\helpers\Url::to(['names']);

// Script to initialize the selection based on the value of the select2 element
$initScript = <<< SCRIPT
function (element, callback) {
    var name=\$(element).val();
    if (name !== "") {
        \$.ajax("{$url}?name=" + name, {
            dataType: "json"
        }).done(function(data) { callback(data.results);});
    }
}
SCRIPT;


    ?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'type' => ActiveForm::TYPE_INLINE
    ]); ?>
    
    <?php
        echo $form->field($model, 'state')->widget(Select2::classname(), [
            'data' => $states,
            'options' => ['placeholder' => Yii::t('Backend', 'Search by state')],
            'pluginOptions' => [
                'allowClear' => true
            ],
            'pluginEvents' => [
                "change" => "function() { this.form.submit() }",
            ],
        ]);
    ?>
    
    <?php
        echo $form->field($model, 'category_id')->widget(Select2::classname(), [
            'data' => $categories,
            'options' => ['placeholder' => Yii::t('Backend', 'Search by category')],
            'pluginOptions' => [
                'allowClear' => true
            ],
            'pluginEvents' => [
                "change" => "function() { this.form.submit() }",
            ],
        ]);
    ?>
    
    <?php
        /*
        echo $form->field($model, 'name')->widget(Select2::classname(), [
            'data' => $names,
            'options' => ['placeholder' => Yii::t('Backend', 'Search by name')],
            'pluginOptions' => [
                'allowClear' => true
            ],
            'pluginEvents' => [
                "change" => "function() { this.form.submit() }",
            ],
        ]);
        */
    ?>

    <?php
    // Name search ajax widget
    echo $form->field($model, 'name')->widget(Select2::classname(), [
        'options' => ['placeholder' => Yii::t('Backend', 'Search by name')],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(term,page) { return {search:term}; }'),
                'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
            ],
            'initSelection' => new JsExpression($initScript)
        ],
        'pluginEvents' => [
            "change" => "function() { this.form.submit() }",
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('Backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php // Html::resetButton(Yii::t('Backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
