<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Customers') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-customers">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        if($provider->getCount() > 0)
        {
            echo GridView::widget([
                'dataProvider' => $provider,
                'columns' => [
                    'company.name:text:' . Yii::t('Backend', "Company"),
                    'createU.partner.name:text:'.Yii::t('Backend', 'Creator'),
                    'name',
                    [
                        'attribute'=>'create_date',
                        'format'=>'date',
                    ],
                    [
                        'label' => Yii::t('Backend', 'Sale orders'),
                        'value' => function($data){ return count($data->saleOrders); },
                        'pageSummary' => true,
                    ],
                    [
                        'label' => Yii::t('Backend', 'Orders value'),
                        'value' => function($data){ $sum = 0; foreach($data->saleOrders as $saleOrder){ $sum += $saleOrder->amount_total; }; return $sum; },
                        'pageSummary' => true, 
                        'format'=>['decimal', 2],
                    ],
                ],
                'showPageSummary' => 'true',
            ]);
        }
        else
        {
            echo( "<p>" );
            echo Yii::t('Backend', 'No customers.');
            echo( "</p>" );
        }
    ?>

</div>
