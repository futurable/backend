<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BankAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bank Accounts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Bank Account',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'bankUser.username',
            'iban',
            'name',
            // 'status',
            // 'create_date',
            // 'modify_date',
            // 'bank_user_id',
            // 'bank_bic_id',
            // 'bank_interest_id',
            // 'bank_currency_id',
            // 'bank_account_type_id',

            ['class' => 'yii\grid\ActionColumn', 'template'=>'{view}'],
        ],
    ]); ?>

</div>
