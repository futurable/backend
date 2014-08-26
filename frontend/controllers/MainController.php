<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Company;

class MainController extends Controller
{
    private $company;
    private $selected_company;
    //public $enableCsrfValidation = false;
    
    public function init()
    {
        parent::init();
        
        // Set the language
        if (isset($_GET['lang'])) {
            \Yii::$app->language = $_GET['lang'];
            \Yii::$app->session['lang'] = \Yii::$app->language;
        } 
        else if (isset(\Yii::$app->language)) 
        {
            \Yii::$app->language = \Yii::$app->session['lang'];
        }
        
        // Set the timezone
        date_default_timezone_set('Europe/Helsinki');
        
        if(!yii::$app->user->isGuest){
            $this->company = Company::findOne(yii::$app->user->identity->company_id);
        }
        
        if(isset(Yii::$app->user->identity)){
            //if(Yii::$app->user->identity->isInstructor){
                if( !\Yii::$app->session['selected_company_id'] )
                {
                    $this->selected_company = $this->company->id;
                }
                else if (isset($_GET['company']))
                {
                    $this->selected_company = $_GET['company'];
                }
                else
                {
                    $this->selected_company = \Yii::$app->session['selected_company_id'];
                }
                
                \Yii::$app->session['selected_company_id'] = $this->selected_company;
                \Yii::$app->session['selected_company_name'] = Company::findOne($this->selected_company)->name;
            //}
        }
    }
    
    protected function getCompany(){
        if($this->company)
        {
            return $this->company;
        }
    }
    
    protected function getSelectedCompany(){
        if($this->selected_company)
        {
            return $this->selected_company;
        }
    }
}

?>