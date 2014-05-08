<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\CostbenefitCalculation $model
 */

$this->title = Yii::t('Backend', 'Update the cost-benefit calculation').': ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Costbenefit Calculations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="costbenefit-calculation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
