<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Suppliers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-suppliers">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        echo( "<p>" );
        echo Yii::t('Backend', 'No suppliers.');
        echo( "</p>" );
    ?>

</div>
