<?php
namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Connection;
use yii\web\Request;

class ErpController extends MainController
{
    protected $connection;
    
    public function behaviors()
    {
        return [
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
            'customers' => ['class' => 'frontend\controllers\erp\CustomersAction'],
            'suppliers' => ['class' => 'frontend\controllers\erp\SuppliersAction'],
            'saleorders' => ['class' => 'frontend\controllers\erp\SaleordersAction'],
            'purchaseorders' => ['class' => 'frontend\controllers\erp\PurchaseordersAction'],
            'automatedorders' => ['class' => 'frontend\controllers\erp\AutomatedordersAction'],
            'customerpayments' => ['class' => 'frontend\controllers\erp\CustomerpaymentsAction'],
            'employees' => ['class' => 'frontend\controllers\erp\EmployeesAction'],
            'timesheets' => ['class' => 'frontend\controllers\erp\TimesheetsAction'],
            'timecards' => ['class' => 'frontend\controllers\erp\TimecardsAction'],
        ];
    }
    
    public function init()
    {
        parent::init();
        $database_name = $this->company->tag;
        
        $db_openerp = require( Yii::getAlias('@common') . '/config/db_openerp.php');
        $db_openerp['dsn'] = "pgsql:host=erp.futurality.fi;dbname={$database_name}";
        
        Yii::$app->setComponents(['db'=>$db_openerp]);
    }
    
    protected function getConnection(){
        if($this->connection){
            return $this->connection;
        }
    }
}
