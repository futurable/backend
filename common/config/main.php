<?php
$db_core = require(__DIR__ . '/db_core.php');
$db_bank = require(__DIR__ . '/db_bank.php');
$db_openerp = require(__DIR__ . '/db_openerp.php');
Yii::setAlias('@base', dirname(dirname(__DIR__)));

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'language' => 'fi',
    'components' => [
        'request' => [
            
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db_core' => $db_core,
        'db_bank' => $db_bank,
        'db' => $db_openerp,
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@base/messages',
                    'sourceLanguage' => 'en',
                ],
            ],
        ],
        'formatter' => [
            'dateFormat' => 'd.MM.Y',
        ]
    ],
];
