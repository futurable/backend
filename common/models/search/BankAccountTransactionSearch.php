<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BankAccountTransaction;

/**
 * BankAccountTransactionSearch represents the model behind the search form about `common\models\BankAccountTransaction`.
 */
class BankAccountTransactionSearch extends BankAccountTransaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['recipient_iban', 'recipient_bic', 'recipient_name', 'payer_iban', 'payer_bic', 'payer_name', 'event_date', 'create_date', 'modify_date', 'reference_number', 'message', 'currency', 'status'], 'safe'],
            [['amount', 'exchange_rate'], 'number'],
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
    public function search($params, $iban)
    {
        $query = BankAccountTransaction::find()
        ->select([
            'event_date',
            'payer_name',
            'payer_iban',
            'recipient_name',
            'recipient_iban',
            'amount' => "IF(payer_iban = '{$iban}', -amount, amount)",
            'message',
        ]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->orFilterWhere(['payer_iban' => $iban]);
        $query->orFilterWhere(['recipient_iban' => $iban]);
        $query->orderBy('event_date DESC');
        
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
            'event_date' => $this->event_date,
            'create_date' => $this->create_date,
            'modify_date' => $this->modify_date,
            'amount' => $this->amount,
            'exchange_rate' => $this->exchange_rate,
        ]);

        $query->andFilterWhere(['like', 'recipient_iban', $this->recipient_iban])
            ->andFilterWhere(['like', 'recipient_bic', $this->recipient_bic])
            ->andFilterWhere(['like', 'recipient_name', $this->recipient_name])
            ->andFilterWhere(['like', 'payer_iban', $this->payer_iban])
            ->andFilterWhere(['like', 'payer_bic', $this->payer_bic])
            ->andFilterWhere(['like', 'payer_name', $this->payer_name])
            ->andFilterWhere(['like', 'reference_number', $this->reference_number])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
