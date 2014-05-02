<?php
namespace frontend\controllers\company;

use yii\base\Action;
use common\models\Company;
use common\models\Remark;
use yii\data\ActiveDataProvider;

class RemarksAction extends Action{
    public function run(){
        
        $company = $this->controller->company;

        $provider = new ActiveDataProvider([
            'query' => Remark::find()->where(['company_id' => $company->id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        return $this->controller->render('remarks', ['provider'=>$provider]);
    }
}