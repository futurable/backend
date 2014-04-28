<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Url;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?= Yii::getAlias('@web') ?>/css/img/favicon.ico" />
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Futural backend',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            if (!Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => Yii::t('Backend', 'Home'), 'url' => ['/site/index']];
                $menuItems[] = ['label' => Yii::t('Backend', 'Logout ({user})', ['user' => Yii::$app->user->identity->username]), 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']];
            }
            
            $menuItems[] = ['label' => 'Language', 'items' => [
                ['label' => 'Finnish', 'url' => Url::canonical().'?lang=fi'],
                ['label' => 'English', 'url' => Url::canonical().'?lang=en'],
            ]];
            
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
        <div id="logo">
            <?php echo Html::img('css/img/futural-logo-backend_h128.png'); ?>
        </div>
        
        <?php
            // Admin menu
            if (!Yii::$app->user->isGuest) {
                    NavBar::begin([
                        'brandLabel' => 'Admin actions',
                        'brandUrl' => Yii::$app->homeUrl,
                    ]);
    
                    $adminMenuItems[] = ['label' => Yii::t('Backend', 'Companies'), 'url' => ['/site/index']];
                    $adminMenuItems[] = ['label' => Yii::t('Backend', 'Orders'), 'url' => ['/site/about']];
                    $adminMenuItems[] = ['label' => Yii::t('Backend', 'Bank accounts'), 'url' => ['/site/about']];
                    $adminMenuItems[] = ['label' => Yii::t('Backend', 'Users'), 'url' => ['/site/about']];
                    $adminMenuItems[] = ['label' => Yii::t('Backend', 'Keys'), 'url' => ['/site/about']];
                
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $adminMenuItems,
                ]);
                NavBar::end();
            }
        ?>
        
        <?php
            // Company menu
            if (!Yii::$app->user->isGuest) {
                    NavBar::begin([
                        'brandLabel' => 'Company actions',
                        'brandUrl' => Yii::$app->homeUrl,
                    ]);
    
                    $companyMenuItems[] = ['label' => Yii::t('Backend', 'Info'), 'url' => ['/company/index']];
                    $companyMenuItems[] = ['label' => Yii::t('Backend', 'Cost-benefit calculation'), 'url' => ['/company/about']];
                    $companyMenuItems[] = ['label' => Yii::t('Backend', 'Customer payments'), 'url' => ['/company/about']];
                    $companyMenuItems[] = ['label' => Yii::t('Backend', 'Employees'), 'url' => ['/company/about']];
                    $companyMenuItems[] = ['label' => Yii::t('Backend', 'Timesheets'), 'url' => ['/company/about']];
                    $companyMenuItems[] = ['label' => Yii::t('Backend', 'Timecards'), 'url' => ['/company/about']];
                    $companyMenuItems[] = ['label' => Yii::t('Backend', 'Sale orders'), 'url' => ['/company/about']];
                    $companyMenuItems[] = ['label' => Yii::t('Backend', 'Purchase orders'), 'url' => ['/company/about']];
                    $companyMenuItems[] = ['label' => Yii::t('Backend', 'Automated orders'), 'url' => ['/company/about']];
                    $companyMenuItems[] = ['label' => Yii::t('Backend', 'Remarks'), 'url' => ['/company/about']];
                
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $companyMenuItems,
                ]);
                NavBar::end();
            }
        ?>
        
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">Futural business simulation environment</p>
            <p class="pull-right">Futurable Oy <?= date('Y') ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
