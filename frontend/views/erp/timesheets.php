<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ButtonGroup;
use yii\widgets\Menu;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Timesheets') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-timesheets">

    <h1><?= Html::encode($this->title) ?></h1>

    <h2><?= Yii::t('Backend', 'Week') . "  " . $viewWeek; ?></h2>
    
    <?php
    if($provider->getCount() > 0)
    {
        echo GridView::widget([
            'dataProvider' => $provider,
            'columns' => [
                'week',
                'user.partner.name',
                'hours_sum',
            ]
        ]);
    }
    else
    {
        echo( "<p>" );
        echo Yii::t('Backend', 'No timesheets.');
        echo( "</p>" );
    }
    
    NavBar::begin(['brandLabel' => yii::t('Backend', 'Week')]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $pages,
    ]);
    NavBar::end();
    ?>

</div>
