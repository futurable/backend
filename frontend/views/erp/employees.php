<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Employees');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-employees">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        echo( "<p>" );
        echo Yii::t('Backend', 'No employees.');
        echo( "</p>" );
    ?>

</div>