<?php
namespace common\commands;

use Yii;

class CompanyAccess
{
    public function getQueryConditions(){
        $company_id = yii::$app->getUser()->identity->company->id;
        $user= yii::$app->getUser()->identity;
        
        $conditions = array();
        
        // Student
        if($user->isUser)
        {
            $conditions['id'] = $company_id;
        }
        // Instructor
        else if($user->isInstructor)
        {
            $conditions['token_customer_id'] = yii::$app->getUser()->identity->tokenCustomer->id;
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