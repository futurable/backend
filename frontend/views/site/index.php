<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'Futural backend';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= \Yii::t('Backend', 'Welcome') ?>!</h1>

        <p class="lead"><?= \Yii::t('Backend', "You are logged in as"); ?></p>
        <p class="lead"><?= Yii::$app->user->identity->username ?> / <?= Yii::$app->user->identity->tokenCustomer->name ?></p>
        <p class="lead"><?= $company->name ?> (<?= $company->business_id ?>)</p>
    </div>

    <div class="body-content">

    </div>
</div>
