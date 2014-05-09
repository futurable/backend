<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;
use common\models\SaleOrder;
use common\models\ResUsers;
use yii\data\SqlDataProvider;

class SaleordersAction extends Action{
    public function run(){
        $provider = New ActiveDataProvider([
            'query' => SaleOrder::find()->joinWith('createU.partner'),
        ]);
        
        return $this->controller->render('saleorders', [
            'provider' => $provider,
        ]);
    }
}
