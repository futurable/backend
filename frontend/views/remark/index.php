<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\RemarkSearch $searchModel
 */

$this->title = Yii::t('Backend', 'Remarks') . ", " . yii::$app->session['selected_company_name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remark-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'company.name',
            'description',
            [
                'attribute' => 'event_date',
                'format' => 'date'
            ],
            [
                'attribute' => 'significance',
                'pageSummary' => true,
                'value' => function($data){ return ($data->significance >= 0) ? "+".$data->significance : $data->significance; },
            ],
            ['class' => 'kartik\grid\ActionColumn', 'template'=>'{view} {update}'],
        ],
        'showPageSummary' => true,
    ]); ?>
    
    <p>
        <?php // echo Html::a(Yii::t('Backend', 'Back'), ['company/index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a(Yii::t('Backend', 'Create a remark'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
