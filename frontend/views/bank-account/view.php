<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\helpers\BaseArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\BankAccount */

$this->title = $bankAccount->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bank Accounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-account-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $bankAccount,
        'attributes' => [
            'iban',
            'name',
            'status',
            'bankUser.username',
        ],
    ]) ?>
    
    <h2><?= Yii::t('app', 'Transactions') ?></h2>
    <?= GridView::widget([
        'dataProvider' => $bankAccountTransactions,
        'filterModel' => $bankAccountTransactionsSearch,
        'columns' => [
            'event_date',
            'payer_name',
            'payer_iban',
            'recipient_name',
            'recipient_iban',
            'amount',
            'message',
        ],
        'showPageSummary' => false,
    ]); ?>
    
</div>
