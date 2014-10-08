<?php
namespace frontend\controllers\costbenefitcalculation;

use yii\base\Action;
use common\models\CostbenefitItem;
use common\models\CostbenefitCalculation;
use yii\data\ActiveDataProvider;
use common\commands\CompanyAccess;
use common\models\ResPartner;

class ViewAction extends Action{
    public function run(){
        $companyAccess = new CompanyAccess();
        
        $company_id = \Yii::$app->session['selected_company_id'];
        $id = CostbenefitCalculation::findOne(['company_id' => $company_id])->id;
        
        // The initial cost-benefit calculation
        $provider = New ActiveDataProvider([
            'query' => CostbenefitItem::find()
                ->joinWith('costbenefitCalculation')
                ->joinWith('costbenefitCalculation.company')
                ->where(['costbenefit_calculation.id' => $id])
                ->andWhere( $companyAccess->getQueryConditions() ),
        ]);
        $model = CostbenefitCalculation::findOne($id);
        
        // The actual cost-benefit calculation values
        
        return $this->controller->render('view', [
            'model' => $model,
            'provider' => $provider
        ]);
    }
}
