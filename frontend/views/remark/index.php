<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\RemarkSearch $searchModel
 */

$this->title = Yii::t('Backend', 'Remarks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remark-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'company.name',
            'description',
            'create_date',
            'event_date',
            'significance',
            // 'company_id',

            ['class' => 'yii\grid\ActionColumn', 'template'=>'{view} {update}'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a(Yii::t('Backend', 'Back'), ['company/index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a(Yii::t('Backend', 'Create a remark'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
