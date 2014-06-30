<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;
use common\models\ResPartner;

class CustomersAction extends Action{
    public function run(){
        $provider = New ActiveDataProvider([
            'query' => ResPartner::find()->where(['customer'=>true]),
        ]);
        
        return $this->controller->render('customers', [
            'provider' => $provider,
        ]);
    }
}
