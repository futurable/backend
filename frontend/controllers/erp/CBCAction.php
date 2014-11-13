<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use common\models\CostbenefitItem;
use common\models\CostbenefitCalculation;
use yii\data\ActiveDataProvider;
use common\commands\CompanyAccess;
use common\models\ResPartner;
use common\models\search\CostbenefitCalculationSearch;
use common\models\AccountMoveLine;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use common\models\CostbenefitItemType;

class CBCAction extends Action{

    public function run(){
        $companyAccess = new CompanyAccess();
        
        $company_id = \Yii::$app->session['selected_company_id'];
        $CBC = CostbenefitCalculation::findOne(['company_id' => $company_id]);
        $id = $CBC ? $CBC->id : false;
        
        if($id === false){
            $cbc = false;
            $cbcTotal = false;
            $plannedProvider = false;
        }
        else {
        
            $planned = CostbenefitItem::find()
            ->joinWith('costbenefitCalculation')
            ->joinWith('costbenefitCalculation.company')
            ->where(['costbenefit_calculation.id' => $id])
            ->andWhere( $companyAccess->getQueryConditions() )
            ->all();
            
            // The initial cost-benefit calculation
            $plannedProvider = New ActiveDataProvider([
                'query' => CostbenefitItem::find()
                    ->joinWith('costbenefitCalculation')
                    ->joinWith('costbenefitCalculation.company')
                    ->where(['costbenefit_calculation.id' => $id])
                    ->andWhere( $companyAccess->getQueryConditions() ),
            ]);
            
            // The actual cost-benefit calculation values
            $searchModel = new CostbenefitCalculationSearch();
            $realized = $searchModel->getRealizedAsArray();
            
            $all = $this->combineCBC($realized, $planned);
            
            $cbc = new ArrayDataProvider([
                'allModels' => $all,
                'pagination' => [
                    'pageSize' => 8,
                ],
            ]);
            
            // The total cost-benefit calculation values
            $realizedTotal = $searchModel->getRealizedTotalAsArray();
            $allTotal = $this->combineCBC($realizedTotal, $planned, true);
            $cbcTotal = new ArrayDataProvider([
                'allModels' => $allTotal,
                'pagination' => [
                    'pageSize' => 8,
                ],
            ]);
        }

        return $this->controller->render('cbc', [
            'cbc' => $cbc,
            'cbcTotal' => $cbcTotal,
            'planned' => $plannedProvider,
        ]);
    }
    
    private function combineCBC($realized, $planned, $total = false){
        $result = [];
        $planned = $this->plannedToArray($planned);
        
        if($total === true){
            $weeks = ['100'];
        } else {
            $weeks = range('42', date('W'));
            $weeks = array_reverse($weeks);
        }
        
        # Get CBC types except side expenses
        $CBCTypes = CostbenefitItemType::find()->where(['!=', 'id', '4'])->orderBy('order')->all();

        foreach($weeks as $week){
            foreach($CBCTypes as $CBCType){
                $object = new CostbenefitItem();
                $object->week = $week;
                $object->planned = $this->getPlanned($CBCType, $planned);
                $object->realized = $this->getRealized($week, $CBCType, $realized);
                $object->value = $CBCType->name;
                $object->type = $CBCType->name;

                $result[] = $object;
            }
        }
        return $result;
        
        foreach($realized as $object){
            $object->name = $this->getName($object);
            $object->realized = $this->getPlanned($object);
            
            $result[] = $object;
        }
        
        return $result;
    }
    
    private function getPlanned($CBCType, $planned){
        $type = $CBCType->id;
        if($CBCType->id === 1) $result =  $planned[$CBCType->id];
        else $result = -$planned[$CBCType->id];
        
        return $result;
    }
    
    private function getRealized($week, $CBCType, $realized){
        $YearWeek = "2014-{$week}"; # @TODO: fix this
        
        $accounts = explode(",", $CBCType->account);
        $result = 0;
        $type = $CBCType->id;
        
        foreach( $accounts as $account ){
            if($week == '100') $value = isset( $realized['100'][$account] ) ? $realized['100'][$account] : 0;
            else $value = isset( $realized[$YearWeek][$account] ) ? $realized[$YearWeek][$account] : 0;
            
            if($CBCType->id !== 1) $value = -$value;
            
            /**
             * Special rules
             */
            // Account 4000000 has VAT 24% included
            if($account === '400000') $value = $value - ($value*0.24);
            
            $result += $value;
        }
        
        return $result;
    }
    
    private function plannedToArray($planned, $total = false){
        $planned = ArrayHelper::toArray($planned);
        
        $result = [];
        
        foreach($planned as $row){
            $result[ $row['costbenefit_item_type_id'] ] = $row['value'];
        }
        
        return $result;
    }
}
