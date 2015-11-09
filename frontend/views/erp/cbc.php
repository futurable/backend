<?php

use yii\helpers\Html;
use kartik\grid\GridView;

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
    if($cbc == true){
    
        GridView::widget([
                'dataProvider' => $planned,
                'columns' => [
                    ['label' => Yii::t('Backend', 'Name'), 'value' => function ($data) { return ucfirst(Yii::t('CostbenefitItem', $data->costbenefitItemType->name)); }],
                    ['label' => Yii::t('Backend', 'Planned')." (".Yii::t('Backend', 'weekly').")", 'value' => function ($data) { return ( ceil($data->value / 4) )." €"; }],
                    ['label' => Yii::t('Backend', 'Planned')." (".Yii::t('Backend', 'monthly').")", 'value' => function ($data) { return $data->value." €"; }],
                ],
            ]);
    
        /**
         *  Weekly
         */
        echo GridView::widget([
                'dataProvider' => $cbc,
                'columns' => [
                    [
                        'attribute' => 'week',
                        'contentOptions' => ['class' => 'strong'],
                    ],
                    [
                        'label' => Yii::t('Backend', 'Name'), 
                        'value' => function ($data) { return ucfirst(Yii::t('CostbenefitItem', $data->type)); }],
                    [
                        'label' => Yii::t('Backend', 'Planned'), #." (".Yii::t('Backend', 'weekly').")",
                        'value' => function ($data) { return ($data->planned / 4); },
                        'format'=>['decimal', 2],
                        'pageSummary' => true,
                        'contentOptions' => ['class' => GridView::TYPE_WARNING],
                    ],
                    [
                        'label' => Yii::t('Backend', 'Realized'), #." (".Yii::t('Backend', 'weekly').")",
                        'attribute' => 'realized',
                        #'value' => function ($data) { return ($data->realized)." €"; },
                        'format'=>['decimal', 2],
                        'pageSummary' => true,
                        'contentOptions' => ['class' => GridView::TYPE_INFO],
                    ],
                    [
                        'label' => Yii::t('Backend', 'Difference'),
                        'value' => function ($data) { return ( ( $data->realized - ($data->planned / 4)) ); },
                        'format'=>['decimal', 2],
                        'pageSummary' => true,
                        'contentOptions' => function($data){ return getColumnClass($data); },
                    ],
                    /*[
                        'label' => Yii::t('Backend', 'Planned')." (".Yii::t('Backend', 'monthly').")",
                        'value' => function ($data) { return ($data->planned)." €"; }
                    ],*/
                ],
                'showPageSummary' => true,
            ]);
        
        /**
         *  Total
         */
        echo "<h2>".Yii::t('Backend', 'All time')."</h2>";
        
        echo GridView::widget([
                'dataProvider' => $cbcTotal,
                'columns' => [
                    [
                        'label' => Yii::t('Backend', 'Name'), 
                        'value' => function ($data) { return ucfirst(Yii::t('CostbenefitItem', $data->type)); }],
                    [
                        'attribute' => 'planned',
                        'label' => Yii::t('Backend', 'Planned')." (".Yii::t('Backend', 'monthly').")",
                        'format'=>['decimal', 2],
                        'pageSummary' => true,
                        'contentOptions' => ['class' => GridView::TYPE_WARNING],
                    ],
                    [
                        'label' => Yii::t('Backend', 'Realized')." (".Yii::t('Backend', 'All time').")",
                        'attribute' => 'realized',
                        'format'=>['decimal', 2],
                        'pageSummary' => true,
                        'contentOptions' => ['class' => GridView::TYPE_INFO],
                    ],
                    [
                        'label' => Yii::t('Backend', 'Difference'),
                        'value' => function ($data) { return ( ( $data->realized - ($data->planned)) ); },
                        'format'=>['decimal', 2],
                        'pageSummary' => true,
                        'contentOptions' => function($data){ return getColumnClass($data); },
                    ],
                    /*[
                        'label' => Yii::t('Backend', 'Planned')." (".Yii::t('Backend', 'monthly').")",
                        'value' => function ($data) { return ($data->planned)." €"; }
                    ],*/
                ],
                'showPageSummary' => true,
            ]);
    }
    else {
        echo "<p>".Yii::t('Backend', 'No cost-benefit calculation for this company.')."</p>";
    }
        
    function getColumnClass($data){
        $class = null;
        
        $positive = ($data->realized - ($data->planned / 4) > 0) ? true : false;

        if($positive) $class = GridView::TYPE_SUCCESS;
        else $class = GridView::TYPE_DANGER;
        
        $result = [ 'class' => $class ];

        return $result;
    }
    
    ?>
    <?php // echo Html::a(Yii::t('Backend', 'Back'), ['index'], ['class' => 'btn btn-danger']) ?>

</div>
