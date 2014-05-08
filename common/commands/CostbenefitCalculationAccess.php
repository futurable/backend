<?php
namespace common\commands;

use Yii;

class CostbenefitCalculationAccess
{
    public function getQueryConditions(){
        $company_id = yii::$app->getUser()->identity->company->id;
        $user= yii::$app->getUser()->identity;
        
        $conditions = array();
        
        // Student
        if($user->isUser)
        {
            $conditions['company_id'] = $company_id;
        }
        // Instructor
        else if($user->isInstructor)
        {
            //$conditions['token_customer_id'] = yii::$app->getUser()->identity->tokenCustomer->id;
            $conditions[1] = 1;
        }
        // Manager, Admin
        else
        {
            // No conditions
            $conditions = false;
        }
        
        return $conditions; 
    }
}