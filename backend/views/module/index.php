<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ModuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('Backend', 'Modules') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ir-module-module-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php echo $this->render('_search', ['model' => $searchModel, 'names' => $names, 'categories' => $categories, 'states' => $states]); ?>

    <br/>
    
    <?php
        # CSS hacks
        $this->registerJs('$( "td:contains(\'installed\')" ).css( "color", "green" )');
        $this->registerJs('$( "td:contains(\'uninstalled\')" ).css( "color", "red" )');
        $this->registerJs('$( "td:contains(\'uninstallable\')" ).css( "color", "grey" )');
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'state',
            'name',
            [
                'attribute'=>'category_id', 
                'label' => Yii::t('Backend', 'Category'),
                'value' => function($data){ return $data->category->name; },
            ],
            'summary',
            [
                'attribute'=>'write_uid',
                'label' => Yii::t('Backend', 'Installed by'),
                'value' => function($data){ return isset($data->writeU->partner->name) ? $data->writeU->partner->name : ''; },
            ],
            [
                'attribute'=>'write_date', 
                'label' => Yii::t('Backend', 'Updated'),
                'value' => function($data){ return substr($data->write_date, 0, 10); },
            ],
            'author',
            'latest_version',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]);
    ?>

</div>
