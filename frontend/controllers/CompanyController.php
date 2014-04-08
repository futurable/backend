<?php
namespace frontend\controllers;

use Yii;
use yii\base\Controller;
use common\models\Company;

class CompanyController extends Controller
{	
	public function actionIndex()
	{
		$company = Company::find();
	
		return $this->render('view', ['company'=>$company]);
	}
}

?>