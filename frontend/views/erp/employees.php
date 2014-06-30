<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Employees') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-employees">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if($provider->getCount() > 0)
    {
        echo GridView::widget([
            'dataProvider' => $provider,
            'columns' => [
                'createU.partner.name:text:'.Yii::t('Backend', 'Creator'),
                'name_related',
                'notes',
            ]
        ]);
    }
    else
    {
        echo( "<p>" );
        echo Yii::t('Backend', 'No employees.');
        echo( "</p>" );
    }
    ?>

</div>
