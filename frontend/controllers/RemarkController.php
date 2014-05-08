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
    
    public function actionIndex()
    {
        $company = parent::getCompany();
        
        $provider = new ActiveDataProvider([
            'query' => Remark::find()->where(['company_id' => $this->company->id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        return $this->render('index', ['provider'=>$provider]);
    }

}
