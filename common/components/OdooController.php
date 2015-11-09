<?php
namespace common\components;

use Yii;
use yii\console\Controller;

class OdooController extends Controller
{
    public static function actionLogin($user, $password, $database="template", $host="localhost")
    {
        // TODO: use namespaces and autoloader. For some reason they are breaking everything at the moment
        require_once(Yii::getAlias('@vendor') . '/tejastank/odooconnector/OdooConnector.php');
        $connector = new \OdooConnector();

        $connector->login($user, $password, $database, $host);
        
        return $connector;
    }
    
    public static function actionLoginOdoo($username=null, $password=null, $database=null, $host=null){
        $odoo_xmlrpc = Yii::$app->params['xmlrpc_odoo'];
        
        $username = $username ? $username : $odoo_xmlrpc['username'];
        $password = $password ? $password : $odoo_xmlrpc['password'];
        $database = $database ? $database : $odoo_xmlrpc['database'];
        $host = $host ? $host : $odoo_xmlrpc['host'];

        return self::actionLogin($username, $password, $database, $host);
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
