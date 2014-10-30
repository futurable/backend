<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Sale orders') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-saleorders">

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
                    'shipped',
                ],
                'showPageSummary' => 'true'
            ]);
        }
        else 
        {
            echo( "<p>" );
            echo Yii::t('Backend', 'No sale orders.');
            echo( "</p>" );
        }
    ?>

</div>
