<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Company;
use common\commands\ConsoleDebug;
use common\models\User;
use common\models\CompanyPasswords;

class UserController extends Controller
{

    public $defaultAction = 'create';
    public $debugLevel = 1;

    public function actionCreate()
    {
        $Debug = new ConsoleDebug();
        $Debug->message('Create backend user action started', $this->debugLevel);
        
        $companies = Company::find()
        ->where('backend_user_created IS NULL')
        ->all();
        
        $Debug->message(count($companies) . " companies found", $this->debugLevel);
        
        foreach($companies as $company){
            $Debug->message("Using company '{$company->name}'");
            
            $backendUser = new User();
            $backendUser->username = $company->tag;
            $password = Yii::$app->getSecurity()->generateRandomKey(8);
            $backendUser->password = Yii::$app->getSecurity()->generatePasswordHash($password);
            $backendUser->email = $company->email;
            $backendUser->role = 10; // @TODO: bind this to the token key
            $backendUser->token_customer_id = $company->token_customer_id;
            $backendUser->company_id = $company->id;
            
            $backendUser->save();
            
            $companyPasswords = $company->companyPasswords;
            $companyPasswords->backend_password = $password;
            $companyPasswords->save();
            
            // @TODO: Fix this to use DbExpression
            $company->backend_user_created = date('Y-m-d H:i:s');
            $company->save();
            
            $Debug->message("User '{$backendUser->username}' saved");
        }
        
        $Debug->message("Done!", $this->debugLevel);
        $Debug->message(false, $this->debugLevel);
    }
}