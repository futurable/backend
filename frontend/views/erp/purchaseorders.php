<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Purchase orders') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-purchaseorders">

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
                        'attribute' => 'amount_untaxed',
                        'value' => function($data){ return $data->amount_untaxed." €"; },
                    ],
                    [
                        'attribute' => 'amount_tax',
                        'value' => function($data){ return $data->amount_tax." €"; },
                    ],
                    [
                        'attribute' => 'amount_total',
                        'value' => function($data){ return $data->amount_total." €"; },
                    ],
                    'state',
                    [
                        'attribute' => 'shipped',
                        'value' => function($data){ return ($data->shipped == true) ? Yii::t('Backend', 'yes') : Yii::t('Backend', 'no'); },
                    ]
                ]
            ]);
        }
        else 
        {
            echo( "<p>" );
            echo Yii::t('Backend', 'No purchase orders.');
            echo( "</p>" );
        }
    ?>

</div>
