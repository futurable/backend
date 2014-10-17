<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IrModuleModule */

$this->title = Yii::t('Backend', 'Create {modelClass}', [
    'modelClass' => 'Ir Module Module',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('Backend', 'Ir Module Modules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ir-module-module-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
