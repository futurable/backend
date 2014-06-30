<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Suppliers'). ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-suppliers">

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
                        'label' => Yii::t('Backend', 'Purchase orders'),
                        'value' => function($data){ return count($data->purchaseOrders); },
                    ],
                    [
                    'label' => Yii::t('Backend', 'Orders value'),
                        'value' => function($data){ $sum = 0; foreach($data->purchaseOrders as $purchaseOrder){ $sum += $purchaseOrder->amount_total; }; return $sum; },
                        'format' => 'double',
                    ]
                ]
            ]);
        }
        else
        {
            echo( "<p>" );
            echo Yii::t('Backend', 'No suppliers.');
            echo( "</p>" );
        }
    ?>

</div>
