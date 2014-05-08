<?php
namespace frontend\controllers\remark;

use yii\base\Action;
use common\models\Company;
use common\models\Remark;
use yii\data\ActiveDataProvider;

class IndexAction extends Action{
    public function run(){
        
        $company = $this->controller->company;

        $provider = new ActiveDataProvider([
            'query' => Remark::find()->where(['company_id' => $company->id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        return $this->controller->render('index', ['provider'=>$provider]);
    }
}