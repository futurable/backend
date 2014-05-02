<?php
namespace frontend\controllers;

use Yii;
use common\models\Company;
use yii\data\ActiveDataProvider;

class CompanyController extends MainController
{
    private $company;
    
    public function actions()
    {
        return [
            'info' => [
                'class' => 'frontend\controllers\company\InfoAction',
            ],
            'costBenefitCalculation' => [
                'class' => 'frontend\controllers\company\CostBenefitCalculationAction',
            ],
        ];
    }
    
    public function init()
    {
        if(!yii::$app->user->isGuest){
            $this->company = Company::findOne(yii::$app->user->identity->company_id);
        }
    }
    
	public function actionIndex()
	{
		$company = $this->company;
	
		return $this->render('view', ['company'=>$company]);
	}
	
	protected function getCompany(){
	    if($this->company)
	    {
	       return $this->company;
	    }
	}
}

?>