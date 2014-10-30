<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\helpers\BaseArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\BankAccount */

$this->title = $bankAccount->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('Backend', 'Bank Account'), 'url' => ['view']];
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
    
    <h2><?= Yii::t('Backend', 'Transactions') ?></h2>
    <?= GridView::widget([
        'dataProvider' => $bankAccountTransactions,
        'filterModel' => $bankAccountTransactionsSearch,
        'columns' => [
            'event_date',
            'payer_name',
            'payer_iban',
            'recipient_name',
            'recipient_iban',
            ['attribute' => 'amount', 'pageSummary' => true, 'format'=>['decimal', 2],],
            'message',
        ],
        'showPageSummary' => true,
    ]); ?>
    
</div>
