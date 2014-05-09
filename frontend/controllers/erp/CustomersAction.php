<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;

class CustomersAction extends Action{
    public function run(){
        return $this->controller->render('customers', [

        ]);
    }
}
