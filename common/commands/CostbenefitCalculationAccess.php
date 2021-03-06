<?php
namespace common\commands;

use Yii;

class CostbenefitCalculationAccess
{
    public function getQueryConditions(){
        $company_id = yii::$app->getUser()->identity->company->id;
        $user= yii::$app->getUser()->identity;
        
        $conditions = array();
        
        // Instructor
        if($user->isInstructor)
        {
            $conditions['token_customer_id'] = yii::$app->getUser()->identity->tokenCustomer->id;
        }
        // Student
        else if($user->isUser)
        {
            $conditions['id'] = $company_id;
        }
        
        return $conditions; 
    }
}