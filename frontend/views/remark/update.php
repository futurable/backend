<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Remark $model
 */

$this->title = Yii::t('Backend', 'Update the remark').': ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Remarks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'company_id' => $model->company_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="remark-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
