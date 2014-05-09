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
            'saleorders' => ['class' => 'frontend\controllers\erp\SaleordersAction'],
        ];
    }
    
    public function init()
    {
        parent::init();
        $database_name = $this->company->tag;

        /*
        Yii::$app->db->close();
        Yii::$app->components['db']['dsn'] = "pgsql:host=erp.futurality.fi;dbname={$database_name}";
        //Yii::$app->db->__set('$dsn', "pgsql:host=erp.futurality.fi;dbname={$database_name}");
        Yii::$app->db->open();
        */
        
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
