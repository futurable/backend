<?php
namespace frontend\controllers\costbenefitcalculation;

use yii\base\Action;
use yii\data\ActiveDataProvider;
use common\models\CostbenefitCalculation;

class IndexAction extends Action{
    public function run(){
        $company = $this->controller->company;
        $costBenefitCalculation = $company->costbenefitCalculations[0];

        $provider = new ActiveDataProvider([
            'query' => CostbenefitCalculation::find()->where(['company_id' => $company->id ]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        return $this->controller->render('index', ['provider'=>$provider]);
    }
}