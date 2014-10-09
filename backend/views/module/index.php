<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ModuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('Backend', 'Modules') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ir-module-module-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <br/>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'state',
            'writeU.partner.name:text:'.Yii::t('Backend', 'Installer'),
            [
                'attribute'=>'write_date', 
                'label' => Yii::t('Backend', 'Updated'),
                'value' => function($data){ return substr($data->write_date, 0, 10); },
            ],
            'name',
            'category.name:text:'.Yii::t('Backend', 'Category'),
            'summary',
            'author',
            'latest_version',
        ],
    ]); ?>

</div>
