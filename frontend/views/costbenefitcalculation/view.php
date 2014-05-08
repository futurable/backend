<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/**
 * @var yii\web\View $this
 */
$this->title = Yii::t('Backend', 'Cost-benefit calculation');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-costBenefitCalculation">

    <div class="body-content">
        <h1><?= Html::encode($this->title) ?></h1>
        
    <?php
        if($provider->getCount() > 0)
        {
            echo GridView::widget([
                'dataProvider' => $provider,
                'columns' => [
                    ['label' => Yii::t('CostbenefitCalculation', 'Name'), 'value' => function ($data) { return ucfirst(Yii::t('CostbenefitItem', $data->name)); }],
                    ['label' => Yii::t('CostbenefitCalculation', 'Planned')." (".Yii::t('CostbenefitCalculation', 'monthly').")", 'value' => function ($data) { return $data->value." €"; }],
                    ['label' => Yii::t('CostbenefitCalculation', 'Realized')." (".Yii::t('CostbenefitCalculation', 'weekly').")"],
                    ['label' => Yii::t('CostbenefitCalculation', 'Realized')." (".Yii::t('CostbenefitCalculation', 'monthly').")"],
                ],
            ]);
        }
    ?>
    </div>
</div>
