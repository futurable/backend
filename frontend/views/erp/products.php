<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Products') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-products">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        if($provider->getCount() > 0)
        {
            echo GridView::widget([
                'dataProvider' => $provider,
                'columns' => [
                    'productTmpl.company.name:text:' . Yii::t('Backend', "Company"),
                    'createU.partner.name:text:'.Yii::t('Backend', 'Creator'),
                    'productTmpl.name',
                    [
                        'attribute'=>'create_date',
                        'format'=>'date',
                    ],
                    [
                        'attribute' => 'productTmpl.list_price',
                        'value' => function($data){ return $data->productTmpl->list_price." €"; },
                    ],
                    'productTmpl.description',
                ]
            ]);
        }
        else
        {
            echo( "<p>" );
            echo Yii::t('Backend', 'No products.');
            echo( "</p>" );
        }
    ?>

</div>
