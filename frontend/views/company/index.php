<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\CompanySearch $searchModel
 */

$this->title = Yii::t('Backend', 'Companies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a('Create Company', ['create'], ['class' => 'btn btn-success']); ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'id',
            'name',
            'tag',
            'business_id',
            'email:email',
            // 'employees',
            // 'active',
            // 'create_time',
            // 'bank_account_created',
            // 'openerp_database_created',
            // 'backend_user_created',
            // 'account_mail_sent',
            // 'token_key_id',
            // 'industry_id',
            // 'token_customer_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>

</div>
