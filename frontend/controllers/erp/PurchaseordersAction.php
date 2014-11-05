<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;
use common\models\PurchaseOrder;

class PurchaseordersAction extends Action{
    public function run(){
        $provider = New ActiveDataProvider([
            'query' => PurchaseOrder::find()->joinWith('createU.partner')->orderBy('date_order DESC'),
        ]);
        
        return $this->controller->render('purchaseorders', [
            'provider' => $provider,
        ]);
    }
}
