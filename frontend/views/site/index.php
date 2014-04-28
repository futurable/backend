<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'Futural backend';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= \Yii::t('Backend', 'Welcome') ?>!</h1>

        <p class="lead"><?= \Yii::t('Backend', "You are logged in as '{username}'!", ['username' => Yii::$app->user->identity->username]); ?></p>

    </div>

    <div class="body-content">

    </div>
</div>
