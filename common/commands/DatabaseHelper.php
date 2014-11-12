<?php
namespace common\commands;

use Yii;
use common\models\ResCompany;

class DatabaseHelper
{
    public function changeOdooDBTo($db_name){
        $database = 'db';
        
        return $this->changeTo($db_name, $database);
    }
    
    public function changeTo($db_name, $database){
        //  TODO: check if the db exists
        
        $db_openerp = Yii::$app->get($database);
        $dsnArray = explode(';',  $db_openerp->dsn);
        
        $DBArray = explode('=', $dsnArray[2]);
        $DBArray[1] = $db_name;
        $dsnArray[2] = implode("=", $DBArray);
        
        $dsn = implode(';', $dsnArray);
        
        $db_new = [
            'class' => get_class($db_openerp),
            'dsn' => $dsn,
            'username' => $db_openerp->username,
            'password' => $db_openerp->password,
            'charset' => $db_openerp->charset,
        ];
        
        $db_openerp->dsn = $dsn;

        $result = Yii::$app->setComponents(['db'=>$db_new]);

        return $result;
    }
}