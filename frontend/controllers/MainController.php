<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Company;

class MainController extends Controller
{
    private $company;
    
    public function init()
    {
        parent::init();
        
        // Set the language
        if (isset($_GET['lang'])) {
            \Yii::$app->language = $_GET['lang'];
            \Yii::$app->session['lang'] = \Yii::$app->language;
        } else
        if (isset(\Yii::$app->session['lang'])) {
            \Yii::$app->session['lang'] = \Yii::$app->language;
        }
        
        // Set the timezone
        date_default_timezone_set('Europe/Helsinki');
        
        if(!yii::$app->user->isGuest){
            $this->company = Company::findOne(yii::$app->user->identity->company_id);
        }
    }
    
    protected function getCompany(){
        if($this->company)
        {
            return $this->company;
        }
    }
}

?>