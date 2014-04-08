<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Company;
use yii\helpers\Security;
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
        
        foreach($companies as $company){
            $Debug->message("Using company '{$company->name}'");
            
            $backendUser = new User();
            $backendUser->username = $company->tag;
            $password = Security::generateRandomKey(8);
            $backendUser->password = $password;
            $backendUser->email = $company->email;
            $backendUser->role = 0; // @TODO: bind this to the token key
            $backendUser->token_customer_id = $company->token_customer_id;
            
            $backendUser->save();
            
            $companyPasswords = $company->companyPasswords;
            $companyPasswords->backend_password = $password;
            $companyPasswords->save();
            
            // @TODO: Fix this to use DbExpression
            $company->backend_user_created = date('Y-m-d H:i:s');
            $company->save();
            
            $Debug->message("User '{$backendUser->username}' saved");
        }
    }
}