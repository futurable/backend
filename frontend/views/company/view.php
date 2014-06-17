<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?php 
        $attributes = [
            'id',
            'name',
            'tag',
            'business_id',
            'email:email',
            'employees',
        ];

        if(yii::$app->user->identity->isInstructor){
            $extra_attributes = [
                'active',
                'create_time',
                'bank_account_created',
                'openerp_database_created',
                'backend_user_created',
                'account_mail_sent',
                'token_key_id',
                'industry_id',
            ];
            
            $attributes = array_merge($attributes, $extra_attributes);
        }
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]) ?>
    <?php // Html::a(Yii::t('Backend', 'Back'), ['index'], ['class' => 'btn btn-danger']) ?>

</div>
