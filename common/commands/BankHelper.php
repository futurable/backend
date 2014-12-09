<?php
namespace common\commands;

use common\models\BankAccountTransaction;
use common\models\Company;
use common\models\BankUser;
use common\models\BankAccount;
class BankHelper {
    
    public function getAccountSaldo($iban, $end_date = false){     
        if(!DataValidator::isDateISOSyntaxValid($end_date)) $end_date = date('Y-m-d');
        
        // Count the bank saldo
        $record = BankAccountTransaction::find()
        ->select(['amount' => "sum(if( recipient_iban = '$iban', amount, -amount ))"]) // @TODO: an injection risk here?
        ->where(['<=', 'event_date', $end_date])
        ->andWhere(['or', ['recipient_iban' => $iban], ['payer_iban' => $iban]])
        ->one();
        
        if(empty($record['amount'])) $record['amount'] = "0.00";
        
        return $record['amount'];
    }
    
    public function getBankUser($company_tag){
        $user = BankUser::findOne(['username'=>$company_tag]);
        return $user;
    }
    
    public function getCheckingAccountByCompanyTag($company_tag, $first = true){
        $user = $this->getBankUser($company_tag);
        
        $account = BankAccount::find()
        ->where(['status'=>'enabled', 'bank_account_type_id' => '1', 'bank_user_id' => $user->id])
        ->one();
        
        return $account;
    }
}
?>
