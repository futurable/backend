<?php
namespace frontend\controllers\erp;

use yii\base\Action;
use yii\data\ActiveDataProvider;
use common\models\ResUsers;

class UsersAction extends Action{
    public function run(){
        $provider = New ActiveDataProvider([
            'query' => ResUsers::find(),
        ]);
        
        return $this->controller->render('users', [
            'provider' => $provider,
        ]);
    }
}
