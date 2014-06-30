<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\CostbenefitCalculation $model
 */

$this->title = Yii::t('Backend', 'Create a cost-benefit calculation');
$this->params['breadcrumbs'][] = ['label' => 'Costbenefit Calculations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="costbenefit-calculation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
