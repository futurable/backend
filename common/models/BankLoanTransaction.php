<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bank_loan_transaction".
 *
 * @property integer $id
 * @property integer $sequence_number
 * @property string $instalment_amount
 * @property string $interest_amount
 * @property string $notification_penalty_sent
 * @property string $create_date
 * @property string $due_date
 * @property string $event_date
 * @property integer $bank_loan_id
 * @property integer $bank_account_transaction_id
 */
class BankLoanTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank_loan_transaction';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_bank');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sequence_number', 'bank_loan_id', 'bank_account_transaction_id'], 'integer'],
            [['instalment_amount', 'interest_amount'], 'number'],
            [['notification_penalty_sent'], 'string'],
            [['create_date', 'due_date', 'event_date'], 'safe'],
            [['bank_loan_id', 'bank_account_transaction_id'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'sequence_number' => Yii::t('Backend', 'Repayment patch sequential number'),
            'instalment_amount' => Yii::t('Backend', 'The amount of instalment paid (no interest)'),
            'interest_amount' => Yii::t('Backend', 'The amount of interest paid ( instalment + interestAmount = repayment )'),
            'notification_penalty_sent' => Yii::t('Backend', 'Whether the payment notification penalty payment has been sent (and paid)'),
            'create_date' => Yii::t('Backend', 'Create Date'),
            'due_date' => Yii::t('Backend', 'When the payment should\'ve been paid'),
            'event_date' => Yii::t('Backend', 'When the payment was paid'),
            'bank_loan_id' => Yii::t('Backend', 'Bank Loan ID'),
            'bank_account_transaction_id' => Yii::t('Backend', 'Bank Account Transaction ID'),
        ];
    }
}
