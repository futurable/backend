<?php
namespace app\components;

use Yii;
use yii\console\Controller;

class OdooController extends Controller
{
    public static function actionLogin($user, $password, $database="template", $host="localhost")
    {
        // TODO: use namespaces and autoloader. For some reason they are breaking everything at the moment
        require_once(\Yii::$app->basePath.'/vendor/tejastank/odooconnector/OdooConnector.php');
        $connector = new \OdooConnector();

        $connector->login($user, $password, $database, $host);
        
        return $connector;
    }
    
    public static function actionLoginOdoo(){
        $odoo_xmlrpc = Yii::$app->params['xmlrpc_odoo'];
        
        return self::actionLogin($odoo_xmlrpc['username'], $odoo_xmlrpc['password'], $odoo_xmlrpc['database'], $odoo_xmlrpc['host']);
    }
    
    public static function actionLoginTemplate(){
        $odoo_xmlrpc = Yii::$app->params['xmlrpc_template'];
        
        return self::actionLogin($odoo_xmlrpc['username'], $odoo_xmlrpc['password'], $odoo_xmlrpc['database'], $odoo_xmlrpc['host']);
    }
    
    public static function actionLoginCompany($database, $username = false, $password = false, $host = false){
        
        if(!$username) $username = Yii::$app->params['xmlrpc_template']['username'];
        if(!$password) $password = Yii::$app->params['xmlrpc_template']['password'];
        if(!$host) $host = Yii::$app->params['xmlrpc_template']['host'];
        
        return self::actionLogin($username, $password, $database, $host);
    }
}
