<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\CostbenefitCalculation $model
 */

$this->title = Yii::t('Backend', 'Cost-benefit calculation') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = ['label' => 'Costbenefit Calculations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="costbenefit-calculation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
    
    foreach($realized as $row){
        echo( "<p>" . $row->attributes['id'] . "</p>" );
    }
    ?>

    <?php
        GridView::widget([
            'dataProvider' => $provider,
            'columns' => [
                ['label' => Yii::t('Backend', 'Name'), 'value' => function ($data) { return ucfirst(Yii::t('CostbenefitItem', $data->costbenefitItemType->name)); }],
                ['label' => Yii::t('Backend', 'Planned')." (".Yii::t('Backend', 'weekly').")", 'value' => function ($data) { return ( ceil($data->value / 4) )." €"; }],
                ['label' => Yii::t('Backend', 'Realized')." (".Yii::t('Backend', 'weekly').")"],
                ['label' => Yii::t('Backend', 'Planned')." (".Yii::t('Backend', 'monthly').")", 'value' => function ($data) { return $data->value." €"; }],
                ['label' => Yii::t('Backend', 'Realized')." (".Yii::t('Backend', 'monthly').")"],
            ],
        ]);
    ?>
    <?php // echo Html::a(Yii::t('Backend', 'Back'), ['index'], ['class' => 'btn btn-danger']) ?>

</div>
