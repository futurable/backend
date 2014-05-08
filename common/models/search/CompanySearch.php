<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Company;

/**
 * CompanySearch represents the model behind the search form about `common\models\Company`.
 */
class CompanySearch extends Company
{
    public function rules()
    {
        return [
            [['id', 'employees', 'active', 'token_key_id', 'industry_id', 'token_customer_id'], 'integer'],
            [['name', 'tag', 'business_id', 'email', 'create_time', 'bank_account_created', 'openerp_database_created', 'backend_user_created', 'account_mail_sent'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Company::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'employees' => $this->employees,
            'active' => $this->active,
            'create_time' => $this->create_time,
            'bank_account_created' => $this->bank_account_created,
            'openerp_database_created' => $this->openerp_database_created,
            'backend_user_created' => $this->backend_user_created,
            'account_mail_sent' => $this->account_mail_sent,
            'token_key_id' => $this->token_key_id,
            'industry_id' => $this->industry_id,
            'token_customer_id' => $this->token_customer_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'business_id', $this->business_id])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
