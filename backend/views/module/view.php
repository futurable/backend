<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\IrModuleModule */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('Backend', 'Ir Module Modules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ir-module-module-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('Backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('Backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('Backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'create_uid',
            'create_date',
            'write_date',
            'write_uid',
            'website',
            'summary',
            'name',
            'author',
            'icon',
            'state',
            'latest_version',
            'shortdesc',
            'category_id',
            'description:ntext',
            'application:boolean',
            'demo:boolean',
            'web:boolean',
            'license',
            'sequence',
            'auto_install:boolean',
            'menus_by_module:ntext',
            'maintainer',
            'contributors:ntext',
            'views_by_module:ntext',
            'reports_by_module:ntext',
            'url:url',
            'published_version',
        ],
    ]) ?>

</div>
