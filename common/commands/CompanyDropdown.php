<?php

namespace common\commands;

use Yii;
use common\models\Company;
use yii\helpers\Url;

class CompanyDropdown {
	public function getMenuDropdown() {
		$companyDropdown = [ ];
		
		$companies = $this->findCompanies ();
		
		foreach ( $companies as $company ) {
			
			$url_parts = explode ( "?", Url::canonical () );
			$url_params = "";
			foreach ( $_GET as $key => $param ) {
				if ($key == "company")
					continue;
				
				$url_params .= "$key=$param&";
			}
			$url = $url_parts [0] . "?" . $url_params . "company={$company->id}";
			
			$companyDropdown [] = [ 
					'label' => $company->name,
					'url' => $url 
			];
		}
		
		return $companyDropdown;
	}
	public function getDropdown() {
		$companies = $this->findCompanies ();
		$companyDropdown = [ ];
		
		foreach ( $companies as $company ) {
			$companyDropdown [$company->id] = $company->name;
		}
		
		return $companyDropdown;
	}
	private function findCompanies() {
		$companyAccess = new CompanyAccess ();
		
		$companies = Company::find ()->select ( [ 
				'id',
				'name' 
		] )
		->where ( $companyAccess->getQueryConditions () )
		->andWhere(['active'=>1])
		->all ();
		
		return $companies;
	}
}