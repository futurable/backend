<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;

class CustomerpaymentsAction extends Action{
    public function run(){
        return $this->controller->render('customerpayments', [

        ]);
    }
}
