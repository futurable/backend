<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\commands\ConsoleDebug;
use yii\helpers\Console;
use common\models\BankLoan;

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
        
        $this->debug->message("Done!", $this->debugLevel, [Console::FG_GREEN]);
        $this->debug->message(false, $this->debugLevel);
    }
    
    private function processLoanRepayments($loans){
        foreach($loans as $loan){
            $this->debug->message("Processing repayments for %W{$loan->bankUser->username}", $this->debugLevel);
            $this->processLoanRepayment($loan);
        }
    }
    
    private function processLoanRepayment(BankLoan $loan){
        $this->debug->message("Processing repayments for account %W{$loan->bankAccount->iban}", $this->debugLevel);
        $this->debug->message(false, $this->debugLevel);
    }
}