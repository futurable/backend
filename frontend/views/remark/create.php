<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Remark $model
 */

$this->title = Yii::t('Backend', 'Create a remark');
$this->params['breadcrumbs'][] = ['label' => 'Remarks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remark-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
