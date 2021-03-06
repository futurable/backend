<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\grid\BooleanColumn;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Sale orders') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-saleorders">

    <h1><?= Html::encode($this->title) ?></h1>

    <h3><?= Yii::t("Backend", "Sale order states") ?></h3>
    <table class="order-stages">
        <tr>
            <td><?= Yii::t("Backend", "draft") ?></td><td><span class='arrow-right' /></td>
            <td><?= Yii::t("Backend", "sent") ?></td><td><span class='arrow-right' /></td>
            <td><?= Yii::t("Backend", "progress") ?></td><td><span class='arrow-right' /></td>
            <td><?= Yii::t("Backend", "manual") ?></td><td><span class='arrow-right' /></td>
            <td><?= Yii::t("Backend", "done") ?></td><td />
        </tr>
    </table>
    
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
                    [
                        'attribute' => 'state',
                        'value' => function($data){ return Yii::t('Backend', $data->state); },
                    ],
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
            echo Yii::t('Backend', 'No sale orders.');
            echo( "</p>" );
        }
    ?>

</div>
