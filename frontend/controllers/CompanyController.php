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
            'index' => ['class' => 'frontend\controllers\company\IndexAction'],
            'view' => ['class' => 'frontend\controllers\company\ViewAction'],
        ];
    }
    
    public function init()
    {
        parent::init();
        $this->company = parent::getCompany();
    }
	
	protected function getCompany(){
	    if($this->company)
	    {
	       return $this->company;
	    }
	}
}

?>