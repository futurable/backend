<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;
use common\models\ResPartner;

class SuppliersAction extends Action{
    public function run(){
        $provider = New ActiveDataProvider([
            'query' => ResPartner::find()->where(['supplier'=>true]),
            ]);
        
        return $this->controller->render('suppliers', [
            'provider' => $provider,
        ]);
    }
}
