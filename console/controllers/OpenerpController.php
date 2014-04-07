<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Company;
use yii\helpers\Security;
use common\commands\CreateTag;
use common\commands\ConsoleDebug;

class OpenerpController extends Controller
{

    public $defaultAction = 'create';

    public $debugLevel = 1;

    public function actionCreate()
    {
        $Debug = new ConsoleDebug();
        $Debug->message('Create OpenERP database action started', $this->debugLevel);
        
        // TODO: fix this hack
        $connection = \Yii::$app->db_core;
        
        // Get all the companies with no bank account
        $command = $connection->createCommand('SELECT * FROM company WHERE openerp_database_created IS NULL');
        $companies = $command->query();
        
        $Debug->message(count($companies) . " companies found", $this->debugLevel);
        
        foreach ($companies as $tmpcompany) {
            $company = new Company();
            $company->attributes = $tmpcompany;
            // $bankAccount->iban = false; // @TODO: fix this
            $bankAccount = '';
            
            $Debug->message("Using company '" . $company->name . "'", $this->debugLevel);
            
            // Create an openerp database
            $OpenErpPassword = Security::generateRandomKey(8);
            
            // @TODO Fix this to use AR
            $command = $connection->createCommand("SELECT tag FROM token_customer WHERE token_customer_id = '{$company->token_customer_id}'");
            $customer_tag = $command->query()->tag;
            
            // $company->tag = $customer_tag."_".$CommonServices->createTagFromName($company->name);
            $CreateTag = new CreateTag();
            $company->tag = $CreateTag->createTagFromName($company->name);
            $Debug->message("Company tag is {$company->tag}", $this->debugLevel);
            
            $cmd = " '$company->tag' '$company->name' '$OpenErpPassword' '$company->business_id' '$company->email' '$bankAccount'";
            $shellCmd = escapeshellcmd($cmd);
            
            $scriptFile = Yii::getAlias('@app') . "/commands/shell/createOpenERPCompany.sh";
            
            $Debug->message($scriptFile . $shellCmd, $this->debugLevel);
            $output = exec("sh " . $scriptFile . $shellCmd);
            
            $Debug->message("Created database '{$company->tag}'", $this->debugLevel);
            
            // @TODO Fix this to use AR
            $command = $connection->createCommand('UPDATE company SET openerp_database_created = NOW()');
            $command->query();
            
            // @TODO Fix this to use AR
            $command = $connection->createCommand("UPDATE company_passwords SET openerp_password = '{$bankUser->password}'");
            $command->query();
            
            $Debug->message(false, $this->debugLevel);
        }
    }
}