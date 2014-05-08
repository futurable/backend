<?php
namespace frontend\controllers\company;

use yii\base\Action;
use common\models\Company;

class InfoAction extends Action{
    public function run(){
        
        $company = $this->controller->company;
        
        return $this->controller->render('info', ['company'=>$company]);
    }
}