<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;
use common\models\ResPartner;
use common\models\ProductProduct;

class ProductsAction extends Action{
    public function run(){
        $provider = New ActiveDataProvider([
            'query' => ProductProduct::find()->orderBy('name_template'),
        ]);
        
        return $this->controller->render('products', [
            'provider' => $provider,
        ]);
    }
}
