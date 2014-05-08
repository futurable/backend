<?php
namespace frontend\controllers\costbenefitcalculation;

use yii\base\Action;
use common\models\CostbenefitItem;
use common\models\CostbenefitCalculation;
use yii\data\ActiveDataProvider;
use common\commands\CompanyAccess;

class ViewAction extends Action{
    public function run($id){
        $companyAccess = new CompanyAccess();
        
        $provider = New ActiveDataProvider([
            'query' => CostbenefitItem::find()
                ->joinWith('costbenefitCalculation')
                ->joinWith('costbenefitCalculation.company')
                ->where(['costbenefit_calculation.id' => $id])
                ->andWhere( $companyAccess->getQueryConditions() ),
        ]);
        $model = CostbenefitCalculation::findOne($id);
        
        return $this->controller->render('view', [
            'model' => $model,
            'provider' => $provider
        ]);
    }
}
