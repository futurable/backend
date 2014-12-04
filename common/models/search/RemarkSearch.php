<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Remark;
use common\commands\CompanyAccess;

/**
 * RemarkSearch represents the model behind the search form about `common\models\Remark`.
 */
class RemarkSearch extends Remark
{
    public function rules()
    {
        return [
            [['id', 'significance', 'company_id'], 'integer'],
            [['description', 'event_date', 'create_date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $company_id = \Yii::$app->session['selected_company_id'];
        $query = Remark::find()->joinWith('company');
        $CompanyAccess = new CompanyAccess();
        $query->andWhere( $CompanyAccess->getQueryConditions() );
        $query->andWhere(['company_id' => $company_id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        	'sort' => [
        		// Set the default sort by name ASC and created_at DESC.
        		'defaultOrder' => [
        			'event_date' => SORT_DESC,
        		]
        	],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'event_date' => $this->event_date,
            'create_date' => $this->create_date,
            'significance' => $this->significance,
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
