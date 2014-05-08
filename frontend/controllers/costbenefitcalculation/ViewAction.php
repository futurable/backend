<?php
namespace frontend\controllers\costbenefitcalculation;

use yii\base\Action;
use yii\data\ActiveDataProvider;
use common\models\CostbenefitItem;

class ViewAction extends Action{
    public function run(){
        $company = $this->controller->company;
        
        $provider = new ActiveDataProvider([
            'query' => CostbenefitItem::find()->where(['company_id' => $company->id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        return $this->controller->render('index', ['provider'=>$provider]);
    }
}