<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
/**
 * @var yii\web\View $this
 */
$this->title = Yii::t('Backend', 'Remarks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-remarks">

    <div class="body-content">
        <h1><?= Html::encode($this->title) ?></h1>
        
    <?php
        if($provider->getCount() > 0)
        {
            echo GridView::widget([
                'dataProvider' => $provider,
                'columns' => [
                    'description',
                    'create_date',
                    'event_date',
                    'significance',
                    ['class' => 'yii\grid\ActionColumn'],
                ]
            ]);
        }
    ?>
    </div>
</div>
