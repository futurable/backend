<?php

namespace frontend\controllers;

use yii\data\ActiveDataProvider;

class CostbenefitCalculationController extends MainController
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
            'index' => ['class' => 'frontend\controllers\costbenefitcalculation\IndexAction'],
            'view' => ['class' => 'frontend\controllers\costbenefitcalculation\ViewAction'],
        ];
    }

}
