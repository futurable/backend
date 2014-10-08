<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account_invoice".
 *
 * @property integer $id
 * @property string $comment
 * @property string $origin
 * @property string $check_total
 * @property integer $partner_bank_id
 * @property integer $payment_term
 * @property string $number
 * @property integer $write_uid
 * @property integer $create_uid
 * @property integer $user_id
 * @property string $supplier_invoice_number
 * @property string $message_last_post
 * @property integer $company_id
 * @property string $amount_tax
 * @property string $type
 * @property boolean $sent
 * @property string $internal_number
 * @property integer $account_id
 * @property string $date_invoice
 * @property integer $period_id
 * @property string $amount_total
 * @property string $name
 * @property integer $commercial_partner_id
 * @property string $date_due
 * @property string $create_date
 * @property string $reference
 * @property integer $currency_id
 * @property integer $partner_id
 * @property integer $fiscal_position
 * @property string $amount_untaxed
 * @property string $reference_type
 * @property integer $journal_id
 * @property string $state
 * @property boolean $reconciled
 * @property string $residual
 * @property string $move_name
 * @property string $write_date
 * @property integer $move_id
 * @property integer $section_id
 *
 * @property CrmCaseSection $section
 * @property ResUsers $writeU
 * @property ResCompany $company
 * @property ResCurrency $currency
 * @property AccountPeriod $period
 * @property ResUsers $createU
 * @property ResUsers $user
 * @property AccountFiscalPosition $fiscalPosition
 * @property AccountPaymentTerm $paymentTerm
 * @property ResPartner $commercialPartner
 * @property AccountJournal $journal
 * @property AccountAccount $account
 * @property ResPartnerBank $partnerBank
 * @property ResPartner $partner
 * @property AccountMove $move
 * @property AccountInvoiceLine[] $accountInvoiceLines
 * @property AccountInvoiceTax[] $accountInvoiceTaxes
 * @property PurchaseInvoiceRel[] $purchaseInvoiceRels
 * @property AccountAnalyticLine[] $accountAnalyticLines
 * @property SaleOrderInvoiceRel[] $saleOrderInvoiceRels
 */
class AccountInvoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_invoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment', 'origin', 'number', 'supplier_invoice_number', 'type', 'internal_number', 'name', 'reference', 'reference_type', 'state', 'move_name'], 'string'],
            [['check_total', 'amount_tax', 'amount_total', 'amount_untaxed', 'residual'], 'number'],
            [['partner_bank_id', 'payment_term', 'write_uid', 'create_uid', 'user_id', 'company_id', 'account_id', 'period_id', 'commercial_partner_id', 'currency_id', 'partner_id', 'fiscal_position', 'journal_id', 'move_id', 'section_id'], 'integer'],
            [['message_last_post', 'date_invoice', 'date_due', 'create_date', 'write_date'], 'safe'],
            [['company_id', 'account_id', 'currency_id', 'partner_id', 'reference_type', 'journal_id'], 'required'],
            [['sent', 'reconciled'], 'boolean'],
            [['number', 'company_id', 'journal_id', 'type'], 'unique', 'targetAttribute' => ['number', 'company_id', 'journal_id', 'type'], 'message' => 'The combination of Number, Company, Type and Journal has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'comment' => Yii::t('Backend', 'Additional Information'),
            'origin' => Yii::t('Backend', 'Source Document'),
            'check_total' => Yii::t('Backend', 'Verification Total'),
            'partner_bank_id' => Yii::t('Backend', 'Bank Account'),
            'payment_term' => Yii::t('Backend', 'Payment Terms'),
            'number' => Yii::t('Backend', 'Number'),
            'write_uid' => Yii::t('Backend', 'Last Updated by'),
            'create_uid' => Yii::t('Backend', 'Created by'),
            'user_id' => Yii::t('Backend', 'Salesperson'),
            'supplier_invoice_number' => Yii::t('Backend', 'Supplier Invoice Number'),
            'message_last_post' => Yii::t('Backend', 'Last Message Date'),
            'company_id' => Yii::t('Backend', 'Company'),
            'amount_tax' => Yii::t('Backend', 'Tax'),
            'type' => Yii::t('Backend', 'Type'),
            'sent' => Yii::t('Backend', 'Sent'),
            'internal_number' => Yii::t('Backend', 'Invoice Number'),
            'account_id' => Yii::t('Backend', 'Account'),
            'date_invoice' => Yii::t('Backend', 'Invoice Date'),
            'period_id' => Yii::t('Backend', 'Force Period'),
            'amount_total' => Yii::t('Backend', 'Total'),
            'name' => Yii::t('Backend', 'Reference/Description'),
            'commercial_partner_id' => Yii::t('Backend', 'Commercial Entity'),
            'date_due' => Yii::t('Backend', 'Due Date'),
            'create_date' => Yii::t('Backend', 'Created on'),
            'reference' => Yii::t('Backend', 'Invoice Reference'),
            'currency_id' => Yii::t('Backend', 'Currency'),
            'partner_id' => Yii::t('Backend', 'Partner'),
            'fiscal_position' => Yii::t('Backend', 'Fiscal Position'),
            'amount_untaxed' => Yii::t('Backend', 'Subtotal'),
            'reference_type' => Yii::t('Backend', 'Payment Reference'),
            'journal_id' => Yii::t('Backend', 'Journal'),
            'state' => Yii::t('Backend', 'Status'),
            'reconciled' => Yii::t('Backend', 'Paid/Reconciled'),
            'residual' => Yii::t('Backend', 'Balance'),
            'move_name' => Yii::t('Backend', 'Journal Entry'),
            'write_date' => Yii::t('Backend', 'Last Updated on'),
            'move_id' => Yii::t('Backend', 'Journal Entry'),
            'section_id' => Yii::t('Backend', 'Sales Team'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(CrmCaseSection::className(), ['id' => 'section_id']);
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
    public function getCompany()
    {
        return $this->hasOne(ResCompany::className(), ['id' => 'company_id']);
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
    public function getPeriod()
    {
        return $this->hasOne(AccountPeriod::className(), ['id' => 'period_id']);
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
    public function getUser()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiscalPosition()
    {
        return $this->hasOne(AccountFiscalPosition::className(), ['id' => 'fiscal_position']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentTerm()
    {
        return $this->hasOne(AccountPaymentTerm::className(), ['id' => 'payment_term']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommercialPartner()
    {
        return $this->hasOne(ResPartner::className(), ['id' => 'commercial_partner_id']);
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
    public function getAccount()
    {
        return $this->hasOne(AccountAccount::className(), ['id' => 'account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartnerBank()
    {
        return $this->hasOne(ResPartnerBank::className(), ['id' => 'partner_bank_id']);
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
    public function getMove()
    {
        return $this->hasOne(AccountMove::className(), ['id' => 'move_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceLines()
    {
        return $this->hasMany(AccountInvoiceLine::className(), ['invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceTaxes()
    {
        return $this->hasMany(AccountInvoiceTax::className(), ['invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseInvoiceRels()
    {
        return $this->hasMany(PurchaseInvoiceRel::className(), ['invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticLines()
    {
        return $this->hasMany(AccountAnalyticLine::className(), ['invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrderInvoiceRels()
    {
        return $this->hasMany(SaleOrderInvoiceRel::className(), ['invoice_id' => 'id']);
    }
}
