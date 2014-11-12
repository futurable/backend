<?php
namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Connection;
use yii\web\Request;
use common\models\Company;
use common\controllers\MainController;
use common\commands\DatabaseHelper;

class ErpController extends MainController
{
    protected $connection;
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'ruleConfig' => [
                    'class' => 'common\components\AccessRule'
                ],
                'rules' => [
                    [
                        'actions' => [
                            'view',
                            'index',
                            'cbc',
                            'customers',
                            'suppliers',
                            'products',
                            'saleorders',
                            'purchaseorders',
                            'invoices',
                            'users',
                            'employees',
                        ],
                        'allow' => true,
                        'roles' => [
                            'user',
                            'instructor',
                            'manager'
                        ]
                    ],
                    [
                        'actions' => [
                            'automatedorders',
                            'customerpayments',
                        ],
                        'allow' => true,
                        'roles' => [
                            'instructor',
                            'manager'
                        ]
                    ],
                    [
                        'actions' => [
                            'delete',
                            'create',
                            'update'
                        ],
                        'allow' => true,
                        'roles' => [
                            'manager'
                        ]
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => [
                        'post'
                    ]
                ]
            ]
        ];
    }
    
    public function actions()
    {
        return [
            'cbc' => ['class' => 'frontend\controllers\erp\CBCAction'],
            'customers' => ['class' => 'frontend\controllers\erp\CustomersAction'],
            'suppliers' => ['class' => 'frontend\controllers\erp\SuppliersAction'],
            'products' => ['class' => 'frontend\controllers\erp\ProductsAction'],
            'saleorders' => ['class' => 'frontend\controllers\erp\SaleordersAction'],
            'purchaseorders' => ['class' => 'frontend\controllers\erp\PurchaseordersAction'],
            'invoices' => ['class' => 'frontend\controllers\erp\InvoicesAction'],
            'automatedorders' => ['class' => 'frontend\controllers\erp\AutomatedordersAction'],
            'customerpayments' => ['class' => 'frontend\controllers\erp\CustomerpaymentsAction'],
            'employees' => ['class' => 'frontend\controllers\erp\EmployeesAction'],
            'users' => ['class' => 'frontend\controllers\erp\UsersAction'],
            'timesheets' => ['class' => 'frontend\controllers\erp\TimesheetsAction'],
            'timecards' => ['class' => 'frontend\controllers\erp\TimecardsAction'],
        ];
    }
    
    public function init()
    {
        parent::init();
        $selected_id = \Yii::$app->session['selected_company_id'];
        $database_name = Company::findOne($selected_id)->tag;
        
        $DBHelper = new DatabaseHelper();
        $DBHelper->changeOdooDBTo($database_name);
    }
    
    protected function getConnection(){
        if($this->connection){
            return $this->connection;
        }
    }
}
