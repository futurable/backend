<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CostbenefitCalculation;
use common\models\Company;
use common\commands\CompanyAccess;
use common\models\AccountMoveLine;

/**
 * CostbenefitCalculationSearch represents the model behind the search form about `common\models\CostbenefitCalculation`.
 */
class CostbenefitCalculationSearch extends CostbenefitCalculation
{
    public function rules()
    {
        return [
            [['id', 'company_id'], 'integer'],
            [['create_date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function getRealizedAsArray(){
        $realized = $this->searchRealized();
        $result = $this->realizedToArray($realized);

        return $result;
    }
    
    public function getRealizedTotalAsArray($from_date = false, $to_date = false){
        $result = [];
        $realized = $this->searchRealizedTotal($from_date, $to_date);
        $result = $this->realizedToArray($realized);
        
        return $result;
    }
    
    private function realizedToArray($realized){
        $result = [];
        
        foreach($realized as $object){
            if(!isset($object->week)) $object->week = 100;
            $result[$object->week][$object->account->code] = abs( $object->credit - $object->debit );
        }
        
        return $result;
    }
    
    public function searchRealized()
    {
        // Get realized items
        $query = AccountMoveLine::find()
        ->select( [ 
            'week' => "to_char(date, 'YYYY-WW')", 
            'account_id',
            'credit' => 'SUM(credit)', 
            'debit' => 'SUM(debit)' ] )
        ->groupBy( [ 'week', 'account_id'] )
        ->orderBy( 'week, account_id' );
        
        $realized = $query->all();

        $realizedProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        return $realized;
    }
    
    public function searchRealizedTotal($from_date = false, $to_date = false)
    {
        // Get realized items
        $query = AccountMoveLine::find()
        ->select( [
            'account_id',
            'credit' => 'SUM(credit)',
            'debit' => 'SUM(debit)' ] )
            ->groupBy( [ 'account_id'] )
            ->orderBy( 'account_id' );
    
        if($from_date) $query->andWhere(['>=', 'date_maturity', $from_date]);
        if($to_date) $query->andWhere(['<=', 'date_maturity', $to_date]);
        
        $realized = $query->all();
    
        $realizedProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    
        return $realized;
    }
    
    public function search($params)
    {
        $query = CostbenefitCalculation::find()->joinWith('company');
        $companyAccess = new CompanyAccess();
        $query->andWhere( $companyAccess->getQueryConditions() );

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'create_date' => $this->create_date,
            'company_id' => $this->company_id,
        ]);

        return $dataProvider;
    }
}
