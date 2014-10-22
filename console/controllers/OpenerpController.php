<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Company;
use common\commands\CreateTag;
use common\commands\ConsoleDebug;
use common\models\BankAccount;
use common\models\BankUser;

class OpenerpController extends Controller
{

    public $defaultAction = 'create';
    public $debugLevel = 1;

    public function actionCreate()
    {
        $Debug = new ConsoleDebug();
        $Debug->message('Create OpenERP database action started', $this->debugLevel);
        
        $companies = Company::find()
        ->where('openerp_database_created IS NULL AND bank_account_created IS NOT NULL')
        ->all();
        
        $Debug->message(count($companies) . " companies found", $this->debugLevel);
        
        foreach ($companies as $company) {
            $bankUser = BankUser::find()->where(['username'=>$company->tag])->one();
            $bankAccount = BankAccount::find()->where(['bank_user_id'=>$bankUser->id])->one();

            $Debug->message("Using company '" . $company->name . "'", $this->debugLevel);
            
            // Create an openerp database
            $OpenErpPassword = Yii::$app->getSecurity()->generateRandomKey(8);
            
            #$CreateTag = new CreateTag();
            #$company->tag = $company->tokenCustomer->tag."_".$CreateTag->createTagFromName($company->name);
            
            $Debug->message("Company tag is {$company->tag}", $this->debugLevel);
            
            $cmd = " '$company->tag' '$company->name' '$OpenErpPassword' '$company->business_id' '$company->email' '$bankAccount->iban'";
            $shellCmd = escapeshellcmd($cmd);
            
            $scriptFile = Yii::getAlias('@app') . "/commands/shell/createOpenERPCompany.sh";
            
            $Debug->message("Creating database '{$company->tag}'", $this->debugLevel);
            $output = exec("sh " . $scriptFile . $shellCmd);
            
            $Debug->message("Created database '{$company->tag}'", $this->debugLevel);
            
            $companyPasswords = $company->companyPasswords;
            $companyPasswords->openerp_password = $OpenErpPassword;
            $companyPasswords->save();
            
            // @TODO: Fix this to use DbExpression
            $company->openerp_database_created = date('Y-m-d H:i:s');
            $company->save();
            
            $Debug->message(false, $this->debugLevel);
        }
        
        $Debug->message("Done!", $this->debugLevel);
        $Debug->message(false, $this->debugLevel);
    }
}