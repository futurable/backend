<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account_account".
 *
 * @property integer $id
 * @property integer $parent_left
 * @property integer $parent_right
 * @property string $code
 * @property string $create_date
 * @property boolean $reconcile
 * @property integer $currency_id
 * @property integer $create_uid
 * @property integer $write_uid
 * @property integer $user_type
 * @property string $write_date
 * @property boolean $active
 * @property string $name
 * @property integer $level
 * @property integer $company_id
 * @property string $shortcut
 * @property string $note
 * @property integer $parent_id
 * @property string $currency_mode
 * @property string $type
 *
 * @property AccountFiscalPositionAccount[] $accountFiscalPositionAccounts
 * @property AccountAccountFinancialReport[] $accountAccountFinancialReports
 * @property AccountAccountTaxDefaultRel[] $accountAccountTaxDefaultRels
 * @property AccountAccountTypeRel[] $accountAccountTypeRels
 * @property AccountInvoice[] $accountInvoices
 * @property AccountInvoiceLine[] $accountInvoiceLines
 * @property AccountInvoiceTax[] $accountInvoiceTaxes
 * @property AccountBankStatementLine[] $accountBankStatementLines
 * @property AccountStatementOperationTemplate[] $accountStatementOperationTemplates
 * @property ReconcileAccountRel[] $reconcileAccountRels
 * @property AccountAnalyticLine[] $accountAnalyticLines
 * @property AccountPartnerBalance[] $accountPartnerBalances
 * @property AccountPartnerLedger[] $accountPartnerLedgers
 * @property AccountPrintJournal[] $accountPrintJournals
 * @property AccountVoucher[] $accountVouchers
 * @property AccountVoucherLine[] $accountVoucherLines
 * @property MrpWorkcenter[] $mrpWorkcenters
 * @property ResCompany[] $resCompanies
 * @property AccountAccountConsolRel[] $accountAccountConsolRels
 * @property AccountBalanceReport[] $accountBalanceReports
 * @property AccountReportGeneralLedger[] $accountReportGeneralLedgers
 * @property AccountGeneralJournal[] $accountGeneralJournals
 * @property AccountCentralJournal[] $accountCentralJournals
 * @property AccountTax[] $accountTaxes
 * @property AccountJournal[] $accountJournals
 * @property StockLocation[] $stockLocations
 * @property AccountVatDeclaration[] $accountVatDeclarations
 * @property AccountAgedTrialBalance[] $accountAgedTrialBalances
 * @property AccountMoveLineReconcileWriteoff[] $accountMoveLineReconcileWriteoffs
 * @property AccountMoveLineUnreconcileSelect[] $accountMoveLineUnreconcileSelects
 * @property AccountMoveLineReconcileSelect[] $accountMoveLineReconcileSelects
 * @property AccountAutomaticReconcile[] $accountAutomaticReconciles
 * @property AccountCommonAccountReport[] $accountCommonAccountReports
 * @property AccountCommonJournalReport[] $accountCommonJournalReports
 * @property AccountingReport[] $accountingReports
 * @property AccountCommonPartnerReport[] $accountCommonPartnerReports
 * @property AccountCommonReport[] $accountCommonReports
 * @property AccountAddtmplWizard[] $accountAddtmplWizards
 * @property AccountMoveLine[] $accountMoveLines
 * @property AccountAccountType $userType
 * @property ResCurrency $currency
 * @property ResUsers $createU
 * @property AccountAccount $parent
 * @property AccountAccount[] $accountAccounts
 * @property ResCompany $company
 * @property ResUsers $writeU
 * @property AccountModelLine[] $accountModelLines
 */
class AccountAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_left', 'parent_right', 'currency_id', 'create_uid', 'write_uid', 'user_type', 'level', 'company_id', 'parent_id'], 'integer'],
            [['code', 'user_type', 'name', 'company_id', 'currency_mode', 'type'], 'required'],
            [['create_date', 'write_date'], 'safe'],
            [['reconcile', 'active'], 'boolean'],
            [['name', 'note', 'currency_mode', 'type'], 'string'],
            [['code'], 'string', 'max' => 64],
            [['shortcut'], 'string', 'max' => 12],
            [['code', 'company_id'], 'unique', 'targetAttribute' => ['code', 'company_id'], 'message' => 'The combination of Code and Company has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'parent_left' => Yii::t('Backend', 'Parent Left'),
            'parent_right' => Yii::t('Backend', 'Parent Right'),
            'code' => Yii::t('Backend', 'Code'),
            'create_date' => Yii::t('Backend', 'Created on'),
            'reconcile' => Yii::t('Backend', 'Allow Reconciliation'),
            'currency_id' => Yii::t('Backend', 'Secondary Currency'),
            'create_uid' => Yii::t('Backend', 'Created by'),
            'write_uid' => Yii::t('Backend', 'Last Updated by'),
            'user_type' => Yii::t('Backend', 'Account Type'),
            'write_date' => Yii::t('Backend', 'Last Updated on'),
            'active' => Yii::t('Backend', 'Active'),
            'name' => Yii::t('Backend', 'Name'),
            'level' => Yii::t('Backend', 'Level'),
            'company_id' => Yii::t('Backend', 'Company'),
            'shortcut' => Yii::t('Backend', 'Shortcut'),
            'note' => Yii::t('Backend', 'Internal Notes'),
            'parent_id' => Yii::t('Backend', 'Parent'),
            'currency_mode' => Yii::t('Backend', 'Outgoing Currencies Rate'),
            'type' => Yii::t('Backend', 'Internal Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalPositionAccounts()
    {
        return $this->hasMany(AccountFiscalPositionAccount::className(), ['account_dest_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAccountFinancialReports()
    {
        return $this->hasMany(AccountAccountFinancialReport::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAccountTaxDefaultRels()
    {
        return $this->hasMany(AccountAccountTaxDefaultRel::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAccountTypeRels()
    {
        return $this->hasMany(AccountAccountTypeRel::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoices()
    {
        return $this->hasMany(AccountInvoice::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceLines()
    {
        return $this->hasMany(AccountInvoiceLine::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceTaxes()
    {
        return $this->hasMany(AccountInvoiceTax::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBankStatementLines()
    {
        return $this->hasMany(AccountBankStatementLine::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountStatementOperationTemplates()
    {
        return $this->hasMany(AccountStatementOperationTemplate::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReconcileAccountRels()
    {
        return $this->hasMany(ReconcileAccountRel::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticLines()
    {
        return $this->hasMany(AccountAnalyticLine::className(), ['general_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPartnerBalances()
    {
        return $this->hasMany(AccountPartnerBalance::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPartnerLedgers()
    {
        return $this->hasMany(AccountPartnerLedger::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPrintJournals()
    {
        return $this->hasMany(AccountPrintJournal::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVouchers()
    {
        return $this->hasMany(AccountVoucher::className(), ['writeoff_acc_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVoucherLines()
    {
        return $this->hasMany(AccountVoucherLine::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpWorkcenters()
    {
        return $this->hasMany(MrpWorkcenter::className(), ['costs_general_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCompanies()
    {
        return $this->hasMany(ResCompany::className(), ['expense_currency_exchange_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAccountConsolRels()
    {
        return $this->hasMany(AccountAccountConsolRel::className(), ['child_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBalanceReports()
    {
        return $this->hasMany(AccountBalanceReport::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountReportGeneralLedgers()
    {
        return $this->hasMany(AccountReportGeneralLedger::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountGeneralJournals()
    {
        return $this->hasMany(AccountGeneralJournal::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCentralJournals()
    {
        return $this->hasMany(AccountCentralJournal::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTaxes()
    {
        return $this->hasMany(AccountTax::className(), ['account_paid_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournals()
    {
        return $this->hasMany(AccountJournal::className(), ['default_debit_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockLocations()
    {
        return $this->hasMany(StockLocation::className(), ['valuation_in_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVatDeclarations()
    {
        return $this->hasMany(AccountVatDeclaration::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAgedTrialBalances()
    {
        return $this->hasMany(AccountAgedTrialBalance::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLineReconcileWriteoffs()
    {
        return $this->hasMany(AccountMoveLineReconcileWriteoff::className(), ['writeoff_acc_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLineUnreconcileSelects()
    {
        return $this->hasMany(AccountMoveLineUnreconcileSelect::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLineReconcileSelects()
    {
        return $this->hasMany(AccountMoveLineReconcileSelect::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAutomaticReconciles()
    {
        return $this->hasMany(AccountAutomaticReconcile::className(), ['writeoff_acc_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonAccountReports()
    {
        return $this->hasMany(AccountCommonAccountReport::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonJournalReports()
    {
        return $this->hasMany(AccountCommonJournalReport::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountingReports()
    {
        return $this->hasMany(AccountingReport::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonPartnerReports()
    {
        return $this->hasMany(AccountCommonPartnerReport::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonReports()
    {
        return $this->hasMany(AccountCommonReport::className(), ['chart_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAddtmplWizards()
    {
        return $this->hasMany(AccountAddtmplWizard::className(), ['cparent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLines()
    {
        return $this->hasMany(AccountMoveLine::className(), ['account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(AccountAccountType::className(), ['id' => 'user_type']);
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
    public function getParent()
    {
        return $this->hasOne(AccountAccount::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAccounts()
    {
        return $this->hasMany(AccountAccount::className(), ['parent_id' => 'id']);
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
    public function getWriteU()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'write_uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountModelLines()
    {
        return $this->hasMany(AccountModelLine::className(), ['account_id' => 'id']);
    }
}
