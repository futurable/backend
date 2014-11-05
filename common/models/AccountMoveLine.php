<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account_move_line".
 *
 * @property integer $id
 * @property string $create_date
 * @property integer $statement_id
 * @property integer $journal_id
 * @property integer $currency_id
 * @property string $date_maturity
 * @property integer $partner_id
 * @property integer $reconcile_partial_id
 * @property boolean $blocked
 * @property integer $analytic_account_id
 * @property integer $create_uid
 * @property string $credit
 * @property string $centralisation
 * @property integer $company_id
 * @property string $reconcile_ref
 * @property integer $tax_code_id
 * @property string $state
 * @property string $debit
 * @property string $ref
 * @property integer $account_id
 * @property integer $period_id
 * @property string $write_date
 * @property string $date_created
 * @property string $date
 * @property integer $write_uid
 * @property integer $move_id
 * @property string $name
 * @property integer $reconcile_id
 * @property string $tax_amount
 * @property integer $product_id
 * @property integer $account_tax_id
 * @property integer $product_uom_id
 * @property string $amount_currency
 * @property string $quantity
 *
 * @property AccountAnalyticLine[] $accountAnalyticLines
 * @property AccountVoucherLine[] $accountVoucherLines
 * @property AccountMoveLineRelation[] $accountMoveLineRelations
 * @property AccountAccount $account
 * @property AccountPeriod $period
 * @property AccountMoveReconcile $reconcilePartial
 * @property AccountBankStatement $statement
 * @property ResCompany $company
 * @property AccountJournal $journal
 * @property ResCurrency $currency
 * @property AccountAnalyticAccount $analyticAccount
 * @property ResUsers $createU
 * @property AccountMove $move
 * @property AccountMoveReconcile $reconcile
 * @property AccountTaxCode $taxCode
 * @property ResPartner $partner
 * @property ResUsers $writeU
 * @property ProductUom $productUom
 * @property ProductProduct $product
 * @property AccountTax $accountTax
 */
class AccountMoveLine extends \yii\db\ActiveRecord
{
    public $week;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_move_line';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date', 'date_maturity', 'write_date', 'date_created', 'date'], 'safe'],
            [['statement_id', 'journal_id', 'currency_id', 'partner_id', 'reconcile_partial_id', 'analytic_account_id', 'create_uid', 'company_id', 'tax_code_id', 'account_id', 'period_id', 'write_uid', 'move_id', 'reconcile_id', 'product_id', 'account_tax_id', 'product_uom_id'], 'integer'],
            [['journal_id', 'account_id', 'period_id', 'date', 'move_id', 'name'], 'required'],
            [['blocked'], 'boolean'],
            [['credit', 'debit', 'tax_amount', 'amount_currency', 'quantity'], 'number'],
            [['reconcile_ref', 'state', 'ref', 'name'], 'string'],
            [['centralisation'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'create_date' => Yii::t('Backend', 'Created on'),
            'statement_id' => Yii::t('Backend', 'Statement'),
            'journal_id' => Yii::t('Backend', 'Journal'),
            'currency_id' => Yii::t('Backend', 'Currency'),
            'date_maturity' => Yii::t('Backend', 'Due date'),
            'partner_id' => Yii::t('Backend', 'Partner'),
            'reconcile_partial_id' => Yii::t('Backend', 'Partial Reconcile'),
            'blocked' => Yii::t('Backend', 'No Follow-up'),
            'analytic_account_id' => Yii::t('Backend', 'Analytic Account'),
            'create_uid' => Yii::t('Backend', 'Created by'),
            'credit' => Yii::t('Backend', 'Credit'),
            'centralisation' => Yii::t('Backend', 'Centralisation'),
            'company_id' => Yii::t('Backend', 'Company'),
            'reconcile_ref' => Yii::t('Backend', 'Reconcile Ref'),
            'tax_code_id' => Yii::t('Backend', 'Tax Account'),
            'state' => Yii::t('Backend', 'Status'),
            'debit' => Yii::t('Backend', 'Debit'),
            'ref' => Yii::t('Backend', 'Reference'),
            'account_id' => Yii::t('Backend', 'Account'),
            'period_id' => Yii::t('Backend', 'Period'),
            'write_date' => Yii::t('Backend', 'Last Updated on'),
            'date_created' => Yii::t('Backend', 'Creation date'),
            'date' => Yii::t('Backend', 'Effective date'),
            'write_uid' => Yii::t('Backend', 'Last Updated by'),
            'move_id' => Yii::t('Backend', 'Journal Entry'),
            'name' => Yii::t('Backend', 'Name'),
            'reconcile_id' => Yii::t('Backend', 'Reconcile'),
            'tax_amount' => Yii::t('Backend', 'Tax/Base Amount'),
            'product_id' => Yii::t('Backend', 'Product'),
            'account_tax_id' => Yii::t('Backend', 'Tax'),
            'product_uom_id' => Yii::t('Backend', 'Unit of Measure'),
            'amount_currency' => Yii::t('Backend', 'Amount Currency'),
            'quantity' => Yii::t('Backend', 'Quantity'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticLines()
    {
        return $this->hasMany(AccountAnalyticLine::className(), ['move_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVoucherLines()
    {
        return $this->hasMany(AccountVoucherLine::className(), ['move_line_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLineRelations()
    {
        return $this->hasMany(AccountMoveLineRelation::className(), ['line_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(AccountAccount::className(), ['id' => 'account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriod()
    {
        return $this->hasOne(AccountPeriod::className(), ['id' => 'period_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReconcilePartial()
    {
        return $this->hasOne(AccountMoveReconcile::className(), ['id' => 'reconcile_partial_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatement()
    {
        return $this->hasOne(AccountBankStatement::className(), ['id' => 'statement_id']);
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
    public function getJournal()
    {
        return $this->hasOne(AccountJournal::className(), ['id' => 'journal_id']);
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
    public function getAnalyticAccount()
    {
        return $this->hasOne(AccountAnalyticAccount::className(), ['id' => 'analytic_account_id']);
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
    public function getMove()
    {
        return $this->hasOne(AccountMove::className(), ['id' => 'move_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReconcile()
    {
        return $this->hasOne(AccountMoveReconcile::className(), ['id' => 'reconcile_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaxCode()
    {
        return $this->hasOne(AccountTaxCode::className(), ['id' => 'tax_code_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartner()
    {
        return $this->hasOne(ResPartner::className(), ['id' => 'partner_id']);
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
    public function getAccountTax()
    {
        return $this->hasOne(AccountTax::className(), ['id' => 'account_tax_id']);
    }
}
