<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Company;
use common\models\TokenCustomer;
use common\models\User;

class MainController extends Controller
{	
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
        
        $user = User::findOne(yii::$app->user->id);
        $tokenCustomer = TokenCustomer::findOne($user->token_customer_id);
    }
}

?>