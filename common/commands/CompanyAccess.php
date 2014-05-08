<?php
namespace common\commands;

use Yii;

class CompanyAccess
{
    public function getQueryConditions(){
        $company_id = yii::$app->getUser()->identity->company->id;
        $user_role = yii::$app->getUser()->identity->role;
        
        $conditions = array();
        
        // Student
        if($user_role < 20)
        {
            $conditions['id'] = $company_id;
        }
        // Instructor
        else if($user_role < 30)
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