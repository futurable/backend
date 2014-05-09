<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\CostbenefitCalculation $model
 */

$this->title = Yii::t('Backend', 'Cost-benefit calculation');
$this->params['breadcrumbs'][] = ['label' => 'Costbenefit Calculations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="costbenefit-calculation-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h2><?= Html::encode( $provider->getModels()[0]->costbenefitCalculation->company->name ) ?></h2>

    <p>
        <?php // Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /* Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */ ?>
    </p>

    <?=
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
    <?= Html::a(Yii::t('Backend', 'Back'), ['index'], ['class' => 'btn btn-danger']) ?>

</div>
