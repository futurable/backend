<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\commands\ConsoleDebug;
use common\models\Company;
use common\models\Salary;
use common\models\BankUser;
use common\models\BankAccount;
use common\models\CostbenefitCalculation;
use common\models\BankAccountTransaction;

class SalaryController extends Controller
{
    
    public $defaultAction = 'pay';
    public $debugLevel = 1;

    public function actionPay()
    {
        $Debug = new ConsoleDebug();
        $Debug->message('Create backend user action started', $this->debugLevel);
        
        # 1. Get all companies
        $companies = Company::find()
        ->where(['active'=>1])
        ->all();
        
        $Debug->message(count($companies) . " companies found", $this->debugLevel);
        
        # 2. Run through each company
        foreach($companies as $company){
            $Debug->message("Using company '{$company->name}'");
           
            # 3. Check if there are salaries to be paid
            $lastSalary = Salary::find()
            ->where(['company_id'=>$company->id])
            ->orderBy('create_date DESC')
            ->one();
            
            if(!empty($lastSalary) AND $lastSalary->week == date('W')){
                $Debug->message("No salary payment pending");
                # Do nothing
                continue;
            }
            
            # 4. There is a salary payment. Get the bank account
            $Debug->message("Salary payment pending");
            
            # 5. Get the bank user
            $bankUser = BankUser::find()->where(['username'=>$company->tag])->one();
            if(empty($bankUser)){
               $Debug->message( "Company has no bank user. Skipping" );
               continue;
            }

            # 6. Get a bank account
            $payerAccount = BankAccount::find()
            ->where(['bank_user_id' => $bankUser->id, 'bank_account_type_id' => 1, 'status' => 'enabled'])
            ->one();
            
            if(empty($payerAccount)){
               $Debug->message( "Company has no bank account. Skipping" );
               continue;
            }
           
            # 7. Get the latest cost-benefit calculation
            $CBC = CostbenefitCalculation::find()
            ->where(['company_id' => $company->id])
            ->orderBy('create_date DESC')
            ->one();
           
           if(empty($CBC)){
               $Debug->message( "No cost-benefit calculation found. Skipping\n" );
               continue;
           }
           
           # 8. Get salaries and side expenses
           $CBCSalaries = $CBC->costbenefitItems[2]->value / 4;
           $CBCSideExpenses = $CBC->costbenefitItems[3]->value / 4;
           $amount = $CBCSalaries + $CBCSideExpenses;
           $Debug->message("Paying salaries for {$amount}");
           
           # 9. Get the recipient account (Futural bank account)
           # @TODO: fetch this from config
           $recipientAccount = BankAccount::find(1)->one();
           
          # 10. Create a new bank transaction
          $bankTransaction = new BankAccountTransaction();
          $bankTransaction->recipient_iban = $recipientAccount->iban;
          $bankTransaction->recipient_bic = $recipientAccount->bankBic->bic;
          $bankTransaction->recipient_name = "Futural Bank"; # @TODO: get this from user
          $bankTransaction->payer_iban = $payerAccount->iban;
          $bankTransaction->payer_bic = $payerAccount->bankBic->bic;
          $bankTransaction->payer_name = $company->name;
          $bankTransaction->event_date = date('Y-m-d');
          $bankTransaction->amount = $amount;
          $bankTransaction->message = "Futurality palkat ja sivukulut, viikko ".date("W");
          
          $transaction = Yii::$app->db->beginTransaction();
          if (! $bankTransaction->save() ) $modelsSaved[] = $bankTransaction->getFirstError();
          else $Debug->message("Created a bank transaction #{$bankTransaction->id}");
          
          # 11. Mark the payment as done
          $salary = new Salary();
          $salary->company_id = $company->id;
          $salary->employees = $company->employees;
          $salary->amount = $amount;
          $salary->week = date('W');
          $salary->year = date('Y');
          $salary->bank_transaction_id = $bankTransaction->id;
          
          if (! $salary->save() ) $modelsSaved[] = $salary->getFirstError();
          else $Debug->message("Marked the salary {$salary->week}/{$salary->year} as paid");
          
          if (empty($modelsSaved)) {
              $transaction->commit();
              $success = true;
          } else {
              foreach($modelsSaved as $error) $Debug->message($error);
              $transaction->rollBack();
              $success = false;
          }
        }
        
        $Debug->message("Done!", $this->debugLevel);
        $Debug->message(false, $this->debugLevel);
    }
}