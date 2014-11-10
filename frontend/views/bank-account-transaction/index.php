<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Bank transactions');
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-account-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $bankAccountTransaction,
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
