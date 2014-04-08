<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\Company;
use yii\helpers\Security;
use common\commands\ConsoleDebug;
use common\models\User;
use common\models\CompanyPasswords;

class SendmailController extends Controller
{
    public $defaultAction = 'create';
    public $debugLevel = 1;

    public function actionCreate()
    {
        $Debug = new ConsoleDebug();
        $Debug->message('Create mail action started', $this->debugLevel);
        
        $companies = Company::find()
        ->where('account_mail_sent IS NULL')
        ->all();
        
        $Debug->message(count($companies) . " companies found", $this->debugLevel);
        
        foreach($companies as $company){
            $Debug->message("Using company '{$company->name}'");
            $content = $this->getMailContent($company);
            
            Yii::$app->mail->compose($content)
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
    
    private function getMailContent($company){
        // Send login information to user
        $messageContent = "<h1>".Yii::t('Company', 'Welcome to Futurality')."</h1>";
        
        $messageContent .= "<p>";
        $messageContent .= Yii::t('Company', 'You have created a company in the')."<br/>";
        $messageContent .= "<a href='https://futurality.fi'>".Yii::t('Company', 'Futurality business simulation')."</a>";
        $messageContent .= "</p>";
        
        $messageContent .= "<p>";
        $messageContent .= Yii::t('Company', 'Your company name is');
        $messageContent .= " <strong>".$company->name."</strong>.<br/>";
        $messageContent .= Yii::t('Company', 'Your company tag is');
        $messageContent .= " <strong>".$company->tag."</strong>.<br>";
        $messageContent .= Yii::t('Company', 'Your business id is');
        $messageContent .= " <strong>".$company->business_id."</strong>.<br>";
        $messageContent .= "</p>";
        
        $messageContent .= "<h2>".Yii::t('Company', 'OpenERP account')."</h2>";
        $messageContent .= "<ul>";
        $messageContent .= "<li>".Yii::t('Company', 'User Id').": <strong>admin</strong></li>";
        $messageContent .= "<li>".Yii::t('Company', 'Password').": <strong>{$company->companyPasswords->openerp_password}</strong></li>";
        $messageContent .= "<li>".Yii::t('Company', 'Login from')." <a href='http://erp.futurality.fi/?db=$company->tag'>erp.futurality.fi</a></li>";
        $messageContent .= "</ul>";
        
        $messageContent .= "<h2>".Yii::t('Company', 'Bank account')."</h2>";
        $messageContent .= "<ul>";
        $messageContent .= "<li>".Yii::t('Company', 'User id').": <strong>$company->tag</strong></li>";
        $messageContent .= "<li>".Yii::t('Company', 'Password').": <strong>{$company->companyPasswords->bank_password}</strong></li>";
        $messageContent .= "<li>".Yii::t('Company', 'Login from')." <a href='http://futurality.fi/bank/index.php/user/login/?company=$company->tag'>futurality.fi/bank</a></li>";
        $messageContent .= "</ul>";
        
        $messageContent .= "<h2>".Yii::t('Company', 'Backend account')."</h2>";
        $messageContent .= "<ul>";
        $messageContent .= "<li>".Yii::t('Company', 'User id').": <strong>$company->tag</strong></li>";
        $messageContent .= "<li>".Yii::t('Company', 'Password').": <strong>{$company->companyPasswords->backend_password}</strong></li>";
        $messageContent .= "<li>".Yii::t('Company', 'Login from')." <a href='http://futurality.fi/backend'>futurality.fi/bank</a></li>";
        $messageContent .= "</ul>";
        
        $messageContent .= "<p><strong>".Yii::t('Company', "Have fun")."!</strong></p>";
        
        $messageContent .= "<p>---</p>";
        $messageContent .= "<p><a href='http://futurable.fi'>Futurable Oy</a><br/>".date('Y')."</p>";

    }
}