<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Timecards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-timecards">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        echo( "<p>" );
        echo Yii::t('Backend', 'No timecards.');
        echo( "</p>" );
    ?>

</div>
