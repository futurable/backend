<?php

namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use common\models\Remark;

class RemarkController extends MainController
{
    private $company;
    
    public function init()
    {
        parent::init();
        $this->company = parent::getCompany();
    }
    
    public function actions()
    {
        return [
            'index' => ['class' => 'frontend\controllers\remark\IndexAction'],
        ];
    }

}
