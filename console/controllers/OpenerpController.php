<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Company;
use yii\helpers\Security;

class OpenerpController extends Controller
{
    public $defaultAction = 'create';
	public $debug = true;
    
    public function actionCreate() {
    	
    	$this->debug("Create database action started");
    	
    	// TODO: fix this hack
    	$connection = \Yii::$app->db_core;
    	
       	// Get all the companies with no bank account
       	$command = $connection->createCommand('SELECT * FROM company WHERE openerp_database_created IS NULL');
       	$companies = $command->query();
       	
       	$this->debug( count($companies). " companies found");
       	
       	foreach($companies as $tmpcompany){
       		$company = new Company();
       		$company->attributes = $tmpcompany;
       		//$bankAccount->iban = false; // @TODO: fix this
       		$bankAccount = '';
       		
       		$this->debug("Using company '".$company->name."'");
       		
       		// Create an openerp database
       		$OpenErpPassword = Security::generateRandomKey(8);
       		$cmd = " '$company->tag' '$company->name' '$OpenErpPassword' '$company->business_id' '$company->email' '$bankAccount'";
       		$shellCmd = escapeshellcmd($cmd);
       		$scriptFile = Yii::getAlias('@app')."/commands/shell/createOpenERPCompany.sh";
       		$this->debug($scriptFile);
       		//$output = exec("sh ".$scriptFile.$shellCmd);
       		
       		
       		//$command = $connection->createCommand('UPDATE company SET openerp_database_created = NOW()');
       		//$companies = $command->query();
       		
       		echo "\n";
       	}
    }

    private function debug($message = false){
    	if($message===false) $debugMessage = "\n";
    	
    	else $debugMessage = date('d-m-Y H:i:s')." ".$message."\n";
    	
    	echo $debugMessage;
		if($this->debug === true);
    }
    
}