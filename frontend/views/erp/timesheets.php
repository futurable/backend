<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Timesheets') . ", " . yii::$app->session['selected_company_name'];;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-timesheets">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        echo( "<p>" );
        echo Yii::t('Backend', 'No timesheets.');
        echo( "</p>" );
    ?>

</div>
