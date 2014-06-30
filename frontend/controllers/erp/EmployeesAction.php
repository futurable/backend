<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;
use common\models\HrEmployee;

class EmployeesAction extends Action{
    public function run(){
        $provider = New ActiveDataProvider([
            'query' => HrEmployee::find(),
        ]);
        
        return $this->controller->render('employees', [
            'provider' => $provider,
        ]);
    }
}
