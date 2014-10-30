<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BankAccount;

/**
 * BankAccountSearch represents the model behind the search form about `common\models\BankAccount`.
 */
class BankAccountSearch extends BankAccount
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bank_user_id', 'bank_bic_id', 'bank_interest_id', 'bank_currency_id', 'bank_account_type_id'], 'integer'],
            [['iban', 'name', 'status', 'create_date', 'modify_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BankAccount::find();

        $query->andFilterWhere(['bank_account_type_id' => '1']);
        $query->orFilterWhere(['status' => 'enabled']);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'create_date' => $this->create_date,
            'modify_date' => $this->modify_date,
            'bank_user_id' => $this->bank_user_id,
            'bank_bic_id' => $this->bank_bic_id,
            'bank_interest_id' => $this->bank_interest_id,
            'bank_currency_id' => $this->bank_currency_id,
            'bank_account_type_id' => $this->bank_account_type_id,
        ]);

        $query->andFilterWhere(['like', 'iban', $this->iban])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
