<?php
namespace common\commands;

use Yii;
use common\models\Company;
use common\models\search\CostbenefitCalculationSearch;
use common\models\CostbenefitItemType;
use common\models\ResCompany;
use common\models\Remark;

class OrderValueMultiplier{
    
    public function get(Company $company){
        
        $DBHelper = new DatabaseHelper();
        $DBHelper->changeOdooDBTo($company->tag)."\n";
        
        $CBCSearch = new CostbenefitCalculationSearch();
        $realized = $CBCSearch->getRealizedTotalAsArray(date('Y-m-d', strtotime('-1 month')),date('Y-m-d'))[100];

        $CBCTypes = CostbenefitItemType::find()->all();
        
        $orderValueMultiplier = 0;
        foreach($CBCTypes as $CBCType) $orderValueMultiplier += $this->getMultiplierValue($CBCType, $realized);
        $orderValueMultiplier = $orderValueMultiplier / count($CBCTypes);
        
        // Add remarks multiplier
        $remarkMultiplier = $this->getRemarkMultiplier($company);
        
        $orderValueMultiplier *= $remarkMultiplier;
        
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
    
        if($factor<8) $factor = 8; // Minimum factor
        if($factor>15) $factor = 15; // Maximum factor
    
        $multiplier = log10($factor);
        
        return $multiplier;
    }
    
    // TODO: calculate the baseline values
    private function getBaseLineValue($account){    
        $baseLineValues = [
            '300000' => '70000',    // Turnover
            '400000' => '54000',    // Expenses
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
}
?>