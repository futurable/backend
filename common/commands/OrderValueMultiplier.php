<?php
namespace common\commands;

use Yii;
use common\models\Company;
use common\models\search\CostbenefitCalculationSearch;
use common\models\CostbenefitItemType;
use common\models\ResCompany;
use common\models\Remark;
use common\components\OdooController;
use yii\helpers\Console;

class OrderValueMultiplier{
    
    private $odooConnector;
    
    public function get(Company $company){
        $this->odooConnector = OdooController::actionLoginOdoo();
        $this->debugger = new ConsoleDebug();

        $DBHelper = new DatabaseHelper();
        $DBHelper->changeOdooDBTo($company->tag)."\n";
        
        $CBCSearch = new CostbenefitCalculationSearch();
        $realized = $CBCSearch->getRealizedTotalAsArray(date('Y-m-d', strtotime('-1 month')),date('Y-m-d'));

        $CBCTypes = CostbenefitItemType::find()->all();
        
        $orderValueMultiplier = 0;
        foreach($CBCTypes as $CBCType) $orderValueMultiplier += $this->getMultiplierValue($CBCType, $realized);
        $orderValueMultiplier = $orderValueMultiplier / count($CBCTypes);
        
        // Add remarks multiplier
        $remarkMultiplier = $this->getRemarkMultiplier($company);
        
        $orderValueMultiplier *= $remarkMultiplier;
        
        // Add contracts multiplier
        $contractMultiplier = $this->getContractMultiplier($company);
        
        $orderValueMultiplier += $contractMultiplier;
        
        return $orderValueMultiplier;
    }
    
    private function getRemarkMultiplier(Company $company){
        $remarks = Remark::find()->where(['company_id'=>$company->id])->one();

        $remarkMultiplier = 1+($remarks['significance']/100);
    
        return $remarkMultiplier;
    }
    
    private function getMultiplierValue(CostbenefitItemType $type, $realized){
        $factor = 0;
        $divider = 0;
        $accounts = explode(',', $type->account);
        
        foreach($accounts as $account){
            if(!isset($realized[$account])) $realized[$account] = 0;

            $value = abs($realized[$account]);
            $baseLine = $this->getBaseLineValue($account);
            $factor += $value / ($baseLine/10);
            $divider++;
        }
        $factor = $factor/$divider;

        if($factor<5) $factor = 5; // Minimum factor
        if($factor>20) $factor = 20; // Maximum factor
    
        $multiplier = log10($factor);
        
        return $multiplier;
    }
    
    // TODO: calculate the baseline values
    private function getBaseLineValue($account){    
        $baseLineValues = [
            '300000' => '70000',    // Turnover
            '287100' => '54000',    // Expenses
            '500000' => '6000',     // Salaries
            '000000' => '4000',     // Loans
            '723000' => '600',      // Rents
            '387000' => '500',      // Communication
            '705000' => '100',      // Health
            '000000' => '100',      // Insurances
            '300000' => '300',      // Logistics
            '107000' => '100',      // Other
        ];
    
        $baseLine = isset($baseLineValues[$account]) ? $baseLineValues[$account] : '500';
    
        return $baseLine;
    }
    
    private function getContractMultiplier($company){
        $supportCompanies = [
            'eetteri',
            'innowoima',
            'rento',
            'virtualdelivery',
            'redo',
            'puhti',
        ];
        
        $totalValue = 0;
        
        foreach($supportCompanies as $supportCompany){
            $this->odooConnector = OdooController::actionLoginOdoo(false, false, $supportCompany);
            
            $contracts = $this->getContracts($company);
            $value = $this->getContractsValue($contracts);
            #$this->debugger->message("{$supportCompany} contracts value is {$value}");
            
            $totalValue += $value;
        }
        
        # $this->debugger->message("Contracts value {$totalValue}");
        
        $baseLine = "300"; // TODO put this to settings
        if($totalValue < 100) $totalValue = 100;
        $multiplier = log10($totalValue / $baseLine);
        
        return $multiplier;
    }
    
    private function getContracts($company){
        $model = 'res.partner';
        $fields = ['id', 'name', 'businessid'];
        $criteria = [ ['businessid', '=', $company->business_id]];
        $ids = $this->odooConnector->search($criteria, $model);
        
        if(!$ids){
            $this->debugger->message("Can't find a company {$company->business_id}");
            return false;
        }
        $odoo_company = $this->odooConnector->read($ids, $fields, $model)[0];
        
        $model = 'account.analytic.account';
        $fields = ['id', 'name'];
        $criteria = [ ['partner_id', '=', $odoo_company['id']], ['state', '=', 'open'] ];
        $ids = $this->odooConnector->search($criteria, $model);
        
        if(!$ids){
            return false;
        }
        
        $contracts = $this->odooConnector->read($ids, $fields, $model);
        $contracts_count = count($contracts);
        
        return $contracts;
    }
    
    private function getContractsValue($contracts){
        if(!is_array($contracts)) return 0.00;
        
        $sum = 0;
        $model = 'account.analytic.invoice.line';
        $fields = ['id', 'name', 'price_subtotal'];
        
        foreach ($contracts as $contract){
            $criteria = [ ['analytic_account_id', '=', ($contract['id'])] ];
            $ids = $this->odooConnector->search($criteria, $model);
            $lines = $this->odooConnector->read($ids, $fields, $model);
            
            foreach($lines as $line){
                $sum += $line['price_subtotal'];
            }
        }
        
        return $sum;
    }
}
?>