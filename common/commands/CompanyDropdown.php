<?php
namespace common\commands;

use Yii;
use common\models\Company;
use yii\helpers\Url;

class CompanyDropdown
{
    public function get(){
        $companyAccess = new CompanyAccess();
        
        $companies = Company::find()
            ->select(['id','name'])
            ->where( $companyAccess->getQueryConditions() )
            ->all();
        
        $companyDropdown = []; 
        
        foreach($companies as $company){
            
            $url_parts = explode("?", Url::canonical());
            $url_params = "";
            foreach($_GET as $key => $param){
                if($key=="company") continue;
                
                $url_params .= "$key=$param&";
            }
            $url = $url_parts[0]."?".$url_params."company={$company->id}";
            
            $companyDropdown[] = [
                'label'=>$company->name,
                'url'=> $url,
            ];
        }
        
        return $companyDropdown;
    }
}