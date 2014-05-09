<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;

class SuppliersAction extends Action{
    public function run(){
        return $this->controller->render('suppliers', [

        ]);
    }
}
