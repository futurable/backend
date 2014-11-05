<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Invoices') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-invoices">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        if($provider->getCount() > 0)
        {
            echo GridView::widget([
                'dataProvider' => $provider,
                'columns' => [
                    'company.name:text:' . Yii::t('Backend', "Company"),
                    [
                        'attribute' => 'createU.partner.name',
                        'label' => Yii::t('Backend', 'Creator'),
                    ],
                    'name',
                    [
                        'attribute' => 'partner.name',
                        'label' => Yii::t('Backend', 'Partner name'),
                    ],
                    [
                        'attribute' => 'create_date',
                        'format' => 'date'
                    ],
                    [
                        'attribute' => 'date_invoice',
                        'format' => 'date'
                    ],
                    [
                        'attribute' => 'amount_untaxed',
                        #'value' => function($data){ return $data->amount_untaxed." €"; },
                        'format'=>['decimal', 2],
                        'pageSummary' => true,
                    ],
                    [
                        'attribute' => 'amount_tax',
                        #'value' => function($data){ return $data->amount_tax." €"; },
                        'format'=>['decimal', 2],
                        'pageSummary' => true,
                    ],
                    [
                        'attribute' => 'amount_total',
                        #'value' => function($data){ return $data->amount_total." €"; },
                        'format'=>['decimal', 2],
                        'pageSummary' => true,
                    ],
                    'state',
                    [
                        'class' => '\kartik\grid\BooleanColumn',
                        'attribute' => 'sent',
                    ],
                ],
                'showPageSummary' => true,
            ]);
        }
        else 
        {
            echo( "<p>" );
            echo Yii::t('Backend', 'No invoices.');
            echo( "</p>" );
        }
    ?>

</div>
