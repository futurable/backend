<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account_analytic_line".
 *
 * @property integer $id
 * @property integer $create_uid
 * @property string $create_date
 * @property string $write_date
 * @property integer $write_uid
 * @property string $amount
 * @property integer $user_id
 * @property string $name
 * @property double $unit_amount
 * @property string $date
 * @property integer $company_id
 * @property integer $account_id
 * @property string $code
 * @property integer $general_account_id
 * @property integer $currency_id
 * @property integer $move_id
 * @property integer $product_id
 * @property integer $product_uom_id
 * @property integer $journal_id
 * @property string $amount_currency
 * @property string $ref
 *
 * @property ResUsers $writeU
 * @property ResUsers $user
 * @property ProductUom $productUom
 * @property ProductProduct $product
 * @property AccountMoveLine $move
 * @property AccountAnalyticJournal $journal
 * @property AccountAccount $generalAccount
 * @property ResCurrency $currency
 * @property ResUsers $createU
 * @property ResCompany $company
 * @property AccountAnalyticAccount $account
 */
class AccountAnalyticLine extends \yii\db\ActiveRecord
{
    public $hours_sum; # The hours sum
    public $week; # The week number with year (yyyy-ww)
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_analytic_line';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_uid', 'write_uid', 'user_id', 'company_id', 'account_id', 'general_account_id', 'currency_id', 'move_id', 'product_id', 'product_uom_id', 'journal_id'], 'integer'],
            [['create_date', 'write_date', 'date'], 'safe'],
            [['amount', 'name', 'date', 'account_id', 'general_account_id', 'journal_id'], 'required'],
            [['amount', 'unit_amount', 'amount_currency'], 'number'],
            [['name'], 'string', 'max' => 256],
            [['code'], 'string', 'max' => 8],
            [['ref'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'create_uid' => Yii::t('Backend', 'Create Uid'),
            'create_date' => Yii::t('Backend', 'Create Date'),
            'write_date' => Yii::t('Backend', 'Write Date'),
            'write_uid' => Yii::t('Backend', 'Write Uid'),
            'amount' => Yii::t('Backend', 'Amount'),
            'user_id' => Yii::t('Backend', 'User'),
            'name' => Yii::t('Backend', 'Description'),
            'unit_amount' => Yii::t('Backend', 'Quantity'),
            'date' => Yii::t('Backend', 'Date'),
            'company_id' => Yii::t('Backend', 'Company'),
            'account_id' => Yii::t('Backend', 'Analytic Account'),
            'code' => Yii::t('Backend', 'Code'),
            'general_account_id' => Yii::t('Backend', 'General Account'),
            'currency_id' => Yii::t('Backend', 'Account Currency'),
            'move_id' => Yii::t('Backend', 'Move Line'),
            'product_id' => Yii::t('Backend', 'Product'),
            'product_uom_id' => Yii::t('Backend', 'Unit of Measure'),
            'journal_id' => Yii::t('Backend', 'Analytic Journal'),
            'amount_currency' => Yii::t('Backend', 'Amount Currency'),
            'ref' => Yii::t('Backend', 'Ref.'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWriteU()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'write_uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductUom()
    {
        return $this->hasOne(ProductUom::className(), ['id' => 'product_uom_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(ProductProduct::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMove()
    {
        return $this->hasOne(AccountMoveLine::className(), ['id' => 'move_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournal()
    {
        return $this->hasOne(AccountAnalyticJournal::className(), ['id' => 'journal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralAccount()
    {
        return $this->hasOne(AccountAccount::className(), ['id' => 'general_account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(ResCurrency::className(), ['id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreateU()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'create_uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(ResCompany::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(AccountAnalyticAccount::className(), ['id' => 'account_id']);
    }
}
