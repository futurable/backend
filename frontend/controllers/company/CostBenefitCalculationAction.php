<?php
namespace frontend\controllers\company;

use yii\base\Action;
use common\models\Company;
use common\models\CostbenefitCalculation;
use yii\data\ActiveDataProvider;
use common\models\CostbenefitItemView;

class CostBenefitCalculationAction extends Action{
    public function run(){
        $company = $this->controller->company;
        // TODO: do something with multiple calculations
        $costBenefitCalculation = $company->costbenefitCalculations[0];

        $provider = new ActiveDataProvider([
            'query' => CostbenefitItemView::find()->where(['costbenefit_calculation_id' => $costBenefitCalculation->id ]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        return $this->controller->render('costBenefitCalculation', ['provider'=>$provider]);
    }
}