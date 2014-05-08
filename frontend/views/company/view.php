<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/**
 * @var yii\web\View $this
 */
$this->title = Yii::t('Backend', 'Company info');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-info">

    <div class="body-content">
        <h1><?= Html::encode($this->title) ?></h1>
        
    <?php
        echo DetailView::widget([
            'model' => $company,
            'attributes' => [
                'name',
                'business_id',
                'email',
                'employees',
                'tag',
            ],
        ]);
    ?>
    </div>
</div>
