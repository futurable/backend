<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Url;
use yii\web\Session;
use yii\helpers\ArrayHelper;
use common\models\Company;
use common\commands\CompanyDropdown;

/**
 *
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?= Yii::getAlias('@web') ?>/css/img/favicon.ico" />
    <?php $this->head()?>
</head>
<body>
    <?php $this->beginBody()?>
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'Futural server backend',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top'
            ]
        ]);
        
        if (! Yii::$app->user->isGuest) {
            $menuItems[] = [
                'label' => Yii::t('Backend', 'Logout ({user})', [
                    'user' => Yii::$app->user->identity->username
                ]),
                'url' => [
                    '/site/logout'
                ],
                'linkOptions' => [
                    'data-method' => 'post'
                ]
            ];
        }
        
        $menuItems[] = [
            'label' => 'Language',
            'items' => [
                [
                    'label' => 'Finnish',
                    'url' => Url::canonical() . '?lang=fi'
                ],
                [
                    'label' => 'English',
                    'url' => Url::canonical() . '?lang=en'
                ]
            ]
        ];
        
        echo Nav::widget([
            'options' => [
                'class' => 'navbar-nav navbar-right'
            ],
            'items' => $menuItems
        ]);
        NavBar::end();
        ?>

        <div class="container">
                
        <div id="logo">
            <?php echo Html::a(Html::img(Yii::getAlias('@web').'/css/img/futural-logo-backend_h128.png'), ['/site/index']); ?>
        </div>
        
        <?php #Breadcrumbs::widget ( [ 'links' => isset ( $this->params ['breadcrumbs'] ) ? $this->params ['breadcrumbs'] : [ ] ] )?>
        
        <?php
        // Admin menu
        if (! Yii::$app->user->isGuest) {
            NavBar::begin([]);
            
            // Instructor actions
            if (Yii::$app->user->identity->isInstructor) {
                $companyDropdown = new CompanyDropdown();
                $subMenuItems[] = [
                    'label' => Yii::t('Backend', 'Selected') . ": " . yii::$app->session['selected_company_name'],
                    'items' => $companyDropdown->getMenuDropdown()
                ];
            }
            
            // User actions
            if (Yii::$app->user->identity->isUser) {
                $subMenuItems[] = [
                    'label' => Yii::t('Menu', 'Modules'),
                    'items' => [
                        [
                            'label' => Yii::t('Menu', 'Modules'),
                            'url' => [
                                '/module/index'
                            ]
                        ],
                    ]
                ];
            }
            
            echo Nav::widget([
                'options' => [
                    'class' => 'navbar-nav navbar-right'
                ],
                'items' => $subMenuItems
            ]);
            NavBar::end();
        }
        ?>
        
        <?= Alert::widget()?>
        <div class='page-content'>
            <?= $content?>
        </div>
		</div>
	</div>

	<footer class="footer">
		<div class="container">
			<p class="pull-left">Futural business simulation environment</p>
			<p class="pull-right">Futurable Oy <?= date('Y') ?></p>
		</div>
	</footer>

    <?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
