<?php
namespace common\commands;

use Yii;
use common\models\Company;
use yii\helpers\Url;

class CompanyDropdown
{

    public function getMenuDropdown()
    {
        $companyDropdown = [];
        
        $companies = $this->findCompanies();
        $absoluteUrl = Yii::$app->request->absoluteUrl;
        
        foreach ($companies as $company) {
            
            if (preg_match("/(company)[=][0-9]+/i", $absoluteUrl)) {
                $url = preg_replace("/(company)[=][0-9]+/i", "company={$company->id}", $absoluteUrl);
            } else {
                if (preg_match('/[?]/', $absoluteUrl) == false)
                    $url = $absoluteUrl . "?company={$company->id}";
                else
                    $url = $absoluteUrl . "&company={$company->id}";
            }
            
            $companyDropdown[] = [
                'label' => $company->name,
                'url' => $url
            ];
        }
        
        return $companyDropdown;
    }

    public function getDropdown()
    {
        $companies = $this->findCompanies();
        $companyDropdown = [];
        
        foreach ($companies as $company) {
            $companyDropdown[$company->id] = $company->name;
        }
        
        return $companyDropdown;
    }

    private function findCompanies()
    {
        $companyAccess = new CompanyAccess();
        
        $companies = Company::find()->select([
            'id',
            'name'
        ])
            ->where($companyAccess->getQueryConditions())
            ->andWhere([
            'active' => 1
        ])
            ->orderBy('name')
		->all ();
		
		return $companies;
	}
}