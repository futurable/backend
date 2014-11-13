<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use common\models\BankProfile;
use yii\helpers\ArrayHelper;
use common\models\BankUser;
use kartik\widgets\Select2;

?>

<div class="bank-account-transaction-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->errorSummary($model); ?>
    
    <?php
        $js = '$( "#bankaccounttransaction-amount" ).change(function() {
            var trimmed = $( "#bankaccounttransaction-amount" ).val();
            trimmed = trimmed.replace(",",".");
            trimmed = trimmed.replace(/[^0-9.]/g,"");

            $( "#bankaccounttransaction-amount" ).val( trimmed );
        });';
        $this->registerJs($js); 
        ?>
    
    <?=
        DatePicker::widget([
            'model'=> $model,
            'attribute' => 'event_date', 
            'value' => date('Y-m-d', strtotime('+0 days')),
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'autoclose' => true,
                'daysOfWeekDisabled' => [0,6],
                'startDate' => date('Y-m-d'),
            ]
        ]);
    ?>
    
    <?php
      echo $form->field($model, 'payer_name')->widget(Select2::classname(), [
            'data' => (ArrayHelper::map(BankUser::find()->where(['status'=>'1'])->all(), 'id', 'username')),
            'options' => ['placeholder' => Yii::t('Backend', 'Payer')],
        ]);
      echo $form->field($model, 'recipient_name')->widget(Select2::classname(), [
            'data' => (ArrayHelper::map(BankUser::find()->where(['status'=>'1'])->all(), 'id', 'username')),
            'options' => ['placeholder' => Yii::t('Backend', 'Recipient')],
        ]);
    ?>
    
    <?php #$form->field($model, 'payer_name')->DropdownList(ArrayHelper::map(BankUser::find()->where(['status'=>'1'])->all(), 'id', 'username')) ?>
    <?php # $form->field($model, 'recipient_name')->DropdownList(ArrayHelper::map(BankUser::find()->where(['status'=>'1'])->all(), 'id', 'username')) ?>
    <?= $form->field($model, 'amount') ?>
    <?= $form->field($model, 'message') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('Backend', 'Create') : Yii::t('Backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
