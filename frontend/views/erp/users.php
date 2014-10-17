<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\Company $model
 */

$this->title = Yii::t('Backend', 'Users') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="erp-users">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if($provider->getCount() > 0)
    {
        echo GridView::widget([
            'dataProvider' => $provider,
            'columns' => [
                'login:text:'.Yii::t('Backend', 'Login name'),
                'partner.name',
                'createU.partner.name:text:'.Yii::t('Backend', 'Creator'),
                [
                    'attribute'=>'create_date',
                    'format'=>'date',
                ],
                
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
