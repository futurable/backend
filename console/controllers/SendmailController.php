<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Company;
use yii\helpers\Security;
use common\commands\ConsoleDebug;
use common\models\User;
use common\models\CompanyPasswords;
use yii\swiftmailer\Mailer;

class SendmailController extends Controller
{
    public $defaultAction = 'create';
    public $debugLevel = 1;

    public function actionCreate()
    {
        $Debug = new ConsoleDebug();
        $Debug->message('Create mail action started', $this->debugLevel);
        
        $companies = Company::find()
        ->where('
                account_mail_sent IS NULL
                AND openerp_database_created IS NOT NULL
                AND bank_account_created IS NOT NULL
                AND backend_user_created IS NOT NULL
            ')
        ->all();
        
        $Debug->message(count($companies) . " companies found", $this->debugLevel);
        
        foreach($companies as $company){
            $Debug->message("Using company '{$company->name}'");
            
            Yii::$app->mail->compose('futuralityAccount', ['company' => $company])
                 ->setFrom(Yii::$app->params['supportEmail'])
                 ->setTo($company->email)
                 ->setBcc(Yii::$app->params['adminEmail'])
                 ->setSubject( Yii::t('Company', "Futurality account for {$company->name}") )
                 ->send();
            
            // @TODO: Fix this to use DbExpression
            $company->account_mail_sent = date('Y-m-d H:i:s');
            $company->save();
            
            $Debug->message("Mail sent to '{$company->email}'");
        }
        
        $Debug->message("Done!", $this->debugLevel);
        $Debug->message(false, $this->debugLevel);
    }
}