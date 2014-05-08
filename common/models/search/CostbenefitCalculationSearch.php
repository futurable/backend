<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CostbenefitCalculation;

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

    public function search($params)
    {
        $query = CostbenefitCalculation::find();

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