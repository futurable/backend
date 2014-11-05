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
        $id = CostbenefitCalculation::findOne(['company_id' => $company_id])->id;
        
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
        $realized = $searchModel->searchRealized();
        
        $all = $this->combineCBC($realized, $planned);
        
        $cbc = new ArrayDataProvider([
            'allModels' => $all,
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        return $this->controller->render('cbc', [
            'cbc' => $cbc,
            'planned' => $plannedProvider,
        ]);
    }
    
    private function combineCBC($realized, $planned){
        $result = [];
        $planned = $this->plannedToArray($planned);
        $realized = $this->realizedToArray($realized);
        
        
        $weeks = ['42','43','44','45'];
        $weeks = array_reverse($weeks);
        $CBCTypes = CostbenefitItemType::find()->all();
        
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
        $week = "2014-{$week}"; # @TODO: fix this
        $accounts = explode(",", $CBCType->account);
        $result = 0;
        $type = $CBCType->id;
        
        foreach( $accounts as $account ){
            $value = isset( $realized[$week][$account] ) ? $realized[$week][$account] : 0;
            if($CBCType->id !== 1) $value = -$value;
            
            $result += $value;
        }
        
        return $result;
    }
    
    private function plannedToArray($planned){
        $planned = ArrayHelper::toArray($planned);
        
        $result = [];
        
        foreach($planned as $row){
            $result[ $row['costbenefit_item_type_id'] ] = $row['value'];
        }
        
        return $result;
    }
    
    private function realizedToArray($realized){
        $result = [];
        
        foreach($realized as $object){
            $result[$object->week][$object->account->code] = abs( $object->credit - $object->debit );
        }
        return $result;
    }
}
