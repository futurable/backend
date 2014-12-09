<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\commands\ConsoleDebug;
use yii\helpers\Console;
use common\models\BankLoan;
use common\models\BankLoanTransaction;
use common\commands\DateFormatter;
use common\commands\BankHelper;
use common\models\BankAccountTransaction;

class LoanController extends Controller
{
    public $defaultAction = 'create';
    public $debugLevel = 1;
    private $debug;

    public function actionCreate()
    {
        $this->debug = new ConsoleDebug();
        $this->debug->message('Loan repayment Create action started', $this->debugLevel);
        
        # 1. Get all active loans
        $loans = BankLoan::find()->where(['status'=>'active'])->all();
        
        # 2. Process the loan repayments
        $this->processLoanRepayments($loans);
        
        $this->debug->message("Done!", $this->debugLevel, [Console::FG_GREEN, Console::BOLD]);
        $this->debug->message(false, $this->debugLevel);
    }
    
    private function processLoanRepayments($loans){
        foreach($loans as $loan){
            $this->debug->message("Processing repayments for %W{$loan->bankUser->username}", $this->debugLevel);
            $this->processLoanRepayment($loan);
            $this->debug->message(false, $this->debugLevel);
        }
    }
    
    private function processLoanRepayment(BankLoan $loan){
        $this->debug->message("Processing repayments for the account %W{$loan->bankAccount->iban}", $this->debugLevel);
        
        $loanTransactions = BankLoanTransaction::find()->where(['bank_loan_id' => $loan->id])->orderBy('event_date DESC')->all(); 
        $this->debug->message( "Found %W".count($loanTransactions)."%n previous loan transactions", $this->debugLevel);
        
        # 3. Check if a payment is due
        // There are previous payments
        if(!empty($loanTransactions)){
            // Latest payment
            $event_date = ($loanTransactions[0]->event_date != null) ? $loanTransactions[0]->event_date : $loan->accept_date;
            $lastPayment = strtotime($event_date);
            $interval = (new DateFormatter())->getDateInterval($loan->interval);
        
            $interval *= 60*60*24; // interval in seconds
            $difference = strtotime(date('Y-m-d')) - $lastPayment;
        }
        
        if(empty($loanTransactions) or $difference > $interval){
            if(empty($loanTransactions)){
                $difference = strtotime(date('Y-m-d')) - strtotime($loan->accept_date);
            }
            
            // The difference in days
            $difference = floor($difference / 86400);
            $this->createLoanRepayment($loan, $difference);
        }
        else{
            $this->debug->message("No repayments for %W{$loan->bankAccount->iban}", $this->debugLevel);
        }
    } 
    
    private function createLoanRepayment(BankLoan $loan, $difference){
        $this->debug->message("The last payment was made %W{$difference} days %nago", $this->debugLevel);
        
        # 4. Calculate the payment amount
        $currencyCode = $loan->bankAccount->bankCurrency->code;
        $saldo = (new BankHelper())->getAccountSaldo($loan->bankAccount->iban);
        $this->debug->message("Loan account saldo is %W{$saldo} {$currencyCode}", $this->debugLevel);
        
        $dailyInterest = $loan->interest / 100 / 360; // Get the interest daily part
        $interestPart = round(-$saldo * $dailyInterest * $difference, 2);
        
        $this->debug->message("Loan type is %W{$loan->type}", $this->debugLevel);
        
        switch ($loan->type) {
            case 'fixedRepayment':
                $repayment = $loan->repayment;
                $instalment = $repayment - $interestPart;
                break;
            case 'fixedInstalment':
                $instalment = $loan->instalment;
                $repayment = $instalment + $interestPart;
                break;
            case 'annuity':
                $term = $loan->term;
                $interval = (new DateFormatter())->getDateInterval($loan->term_interval);
                $days = $term * $interval;
                $repayment = -$saldo / $days;
                $instalment = $repayment - $interestPart;
                break;
        }
        $this->debug->message( "Repayment is %W{$repayment} {$currencyCode}", $this->debugLevel);
        $this->debug->message( "Instalment is %W{$instalment} {$currencyCode}", $this->debugLevel);
        $this->debug->message( "Interest is %W$interestPart {$currencyCode}", $this->debugLevel);
        
        # 5. Make the repayment
        $checkingAccount = (new BankHelper())->getCheckingAccountByCompanyTag($loan->bankUser->username);
        $accountTransaction = new BankAccountTransaction();
        $accountTransaction->recipient_iban = $loan->bankAccount->iban;
        $accountTransaction->recipient_bic = $loan->bankAccount->bankBic->bic;
        $accountTransaction->recipient_name = "Futural bank"; // @TODO: get this from somewhere
        $accountTransaction->payer_iban = $checkingAccount->iban;
        $accountTransaction->payer_bic = $checkingAccount->bankBic->bic;
        $accountTransaction->payer_name = $checkingAccount->bankUser->name;
        $accountTransaction->create_date = date('Y-m-d H:i:s');
        $accountTransaction->event_date = date('Y-m-d');
        $accountTransaction->amount = $repayment;
        $accountTransaction->message = Yii::t('Loan', 'Loan repayment');
        $accountTransactionSuccess = $accountTransaction->save();
        if($accountTransactionSuccess) $this->debug->message( "Account transaction #%W{$accountTransaction->id}%n created", $this->debugLevel);
        
        # 6. Make a new loan transaction
        $loanTransaction = new BankLoanTransaction();
        
        $sequenceNumber = empty($loanTransactions) ? 1 : $loanTransactions[0]->sequence_number + 1;
        $loanTransaction->sequence_number = $sequenceNumber;
        $loanTransaction->instalment_amount = $instalment;
        $loanTransaction->interest_amount = $interestPart;
        $loanTransaction->event_date = date('Y-m-d');
        $loanTransaction->due_date = date('Y-m-d',  strtotime("-$difference day", time()));
        $loanTransaction->bank_loan_id = $loan->id;
        $loanTransaction->bank_account_transaction_id = $accountTransaction->id;
         
        $loanTransactionSuccess = $loanTransaction->save();
        if($loanTransactionSuccess) $this->debug->message( "Loan transaction #%W{$loanTransaction->id}%n created", $this->debugLevel);
        
        // @TODO: db transaction
    }
}