<?php

use yii\helpers\Html;
use kartik\grid\GridView;

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
                        'attribute' => 'date_order',
                        'format' => 'date'
                    ],
                    [
                        'attribute' => 'create_date',
                        'format' => 'date'
                    ],
                    [
                        'attribute' => 'amount_untaxed',
                        'pageSummary' => true,
                        'format'=>['decimal', 2],
                    ],
                    [
                        'attribute' => 'amount_tax',
                        'pageSummary' => true,
                        'format'=>['decimal', 2],
                    ],
                    [
                        'attribute' => 'amount_total',
                        'pageSummary' => true,
                        'format'=>['decimal', 2],
                    ],
                    'state',
                    [ 
                        'class' => '\kartik\grid\BooleanColumn',
                        'attribute' => 'shipped',
                    ],
                ],
                'showPageSummary' => 'true'
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
