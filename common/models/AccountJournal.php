<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account_journal".
 *
 * @property integer $id
 * @property string $code
 * @property string $create_date
 * @property integer $write_uid
 * @property integer $loss_account_id
 * @property integer $currency
 * @property integer $internal_account_id
 * @property integer $create_uid
 * @property integer $user_id
 * @property boolean $cash_control
 * @property boolean $centralisation
 * @property integer $company_id
 * @property integer $profit_account_id
 * @property string $type
 * @property integer $default_debit_account_id
 * @property integer $default_credit_account_id
 * @property integer $sequence_id
 * @property string $write_date
 * @property boolean $allow_date
 * @property boolean $update_posted
 * @property string $name
 * @property integer $analytic_journal_id
 * @property boolean $with_last_closing_balance
 * @property boolean $entry_posted
 * @property boolean $group_invoice_lines
 *
 * @property AccountAccountTypeRel[] $accountAccountTypeRels
 * @property AccountAgedTrialBalanceJournalRel[] $accountAgedTrialBalanceJournalRels
 * @property AccountAutomaticReconcile[] $accountAutomaticReconciles
 * @property AccountBalanceReportJournalRel[] $accountBalanceReportJournalRels
 * @property AccountBankStatement[] $accountBankStatements
 * @property AccountBankStatementLine[] $accountBankStatementLines
 * @property AccountCentralJournalJournalRel[] $accountCentralJournalJournalRels
 * @property AccountCommonAccountReportAccountJournalRel[] $accountCommonAccountReportAccountJournalRels
 * @property AccountCommonJournalReportAccountJournalRel[] $accountCommonJournalReportAccountJournalRels
 * @property AccountCommonPartnerReportAccountJournalRel[] $accountCommonPartnerReportAccountJournalRels
 * @property AccountCommonReportAccountJournalRel[] $accountCommonReportAccountJournalRels
 * @property AccountConfigSettings[] $accountConfigSettings
 * @property AccountConfigSettings[] $accountConfigSettings0
 * @property AccountConfigSettings[] $accountConfigSettings1
 * @property AccountConfigSettings[] $accountConfigSettings2
 * @property AccountFiscalyearClose[] $accountFiscalyearCloses
 * @property AccountGeneralJournalJournalRel[] $accountGeneralJournalJournalRels
 * @property AccountInvoice[] $accountInvoices
 * @property AccountInvoiceRefund[] $accountInvoiceRefunds
 * @property AccountAccount $lossAccount
 * @property AccountAccount $internalAccount
 * @property AccountAccount $profitAccount
 * @property AccountAccount $defaultDebitAccount
 * @property AccountAccount $defaultCreditAccount
 * @property AccountAnalyticJournal $analyticJournal
 * @property IrSequence $sequence
 * @property ResCompany $company
 * @property ResCurrency $currency0
 * @property ResUsers $writeU
 * @property ResUsers $createU
 * @property ResUsers $user
 * @property AccountJournalAccountVatDeclarationRel[] $accountJournalAccountVatDeclarationRels
 * @property AccountJournalAccountingReportRel[] $accountJournalAccountingReportRels
 * @property AccountJournalCashboxLine[] $accountJournalCashboxLines
 * @property AccountJournalGroupRel[] $accountJournalGroupRels
 * @property AccountJournalPeriod[] $accountJournalPeriods
 * @property AccountJournalTypeRel[] $accountJournalTypeRels
 * @property AccountModel[] $accountModels
 * @property AccountMove[] $accountMoves
 * @property AccountMoveBankReconcile[] $accountMoveBankReconciles
 * @property AccountMoveLine[] $accountMoveLines
 * @property AccountMoveLineReconcileWriteoff[] $accountMoveLineReconcileWriteoffs
 * @property AccountPartnerBalanceJournalRel[] $accountPartnerBalanceJournalRels
 * @property AccountPartnerLedgerJournalRel[] $accountPartnerLedgerJournalRels
 * @property AccountPrintJournalJournalRel[] $accountPrintJournalJournalRels
 * @property AccountReportGeneralLedgerJournalRel[] $accountReportGeneralLedgerJournalRels
 * @property AccountVoucher[] $accountVouchers
 * @property PurchaseOrder[] $purchaseOrders
 * @property ResPartnerBank[] $resPartnerBanks
 * @property StockInvoiceOnshipping[] $stockInvoiceOnshippings
 * @property WizardValidateAccountMoveJournal[] $wizardValidateAccountMoveJournals
 */
class AccountJournal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_journal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'company_id', 'type', 'sequence_id', 'name'], 'required'],
            [['create_date', 'write_date'], 'safe'],
            [['write_uid', 'loss_account_id', 'currency', 'internal_account_id', 'create_uid', 'user_id', 'company_id', 'profit_account_id', 'default_debit_account_id', 'default_credit_account_id', 'sequence_id', 'analytic_journal_id'], 'integer'],
            [['cash_control', 'centralisation', 'allow_date', 'update_posted', 'with_last_closing_balance', 'entry_posted', 'group_invoice_lines'], 'boolean'],
            [['name'], 'string'],
            [['code'], 'string', 'max' => 5],
            [['type'], 'string', 'max' => 32],
            [['code', 'company_id'], 'unique', 'targetAttribute' => ['code', 'company_id'], 'message' => 'The combination of Code and Company ID has already been taken.'],
            [['name', 'company_id'], 'unique', 'targetAttribute' => ['name', 'company_id'], 'message' => 'The combination of Company ID and Name has already been taken.'],
            [['loss_account_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountAccount::className(), 'targetAttribute' => ['loss_account_id' => 'id']],
            [['internal_account_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountAccount::className(), 'targetAttribute' => ['internal_account_id' => 'id']],
            [['profit_account_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountAccount::className(), 'targetAttribute' => ['profit_account_id' => 'id']],
            [['default_debit_account_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountAccount::className(), 'targetAttribute' => ['default_debit_account_id' => 'id']],
            [['default_credit_account_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountAccount::className(), 'targetAttribute' => ['default_credit_account_id' => 'id']],
            [['analytic_journal_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountAnalyticJournal::className(), 'targetAttribute' => ['analytic_journal_id' => 'id']],
            [['sequence_id'], 'exist', 'skipOnError' => true, 'targetClass' => IrSequence::className(), 'targetAttribute' => ['sequence_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => ResCompany::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['currency'], 'exist', 'skipOnError' => true, 'targetClass' => ResCurrency::className(), 'targetAttribute' => ['currency' => 'id']],
            [['write_uid'], 'exist', 'skipOnError' => true, 'targetClass' => ResUsers::className(), 'targetAttribute' => ['write_uid' => 'id']],
            [['create_uid'], 'exist', 'skipOnError' => true, 'targetClass' => ResUsers::className(), 'targetAttribute' => ['create_uid' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => ResUsers::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'code' => Yii::t('Backend', 'Code'),
            'create_date' => Yii::t('Backend', 'Create Date'),
            'write_uid' => Yii::t('Backend', 'Write Uid'),
            'loss_account_id' => Yii::t('Backend', 'Loss Account ID'),
            'currency' => Yii::t('Backend', 'Currency'),
            'internal_account_id' => Yii::t('Backend', 'Internal Account ID'),
            'create_uid' => Yii::t('Backend', 'Create Uid'),
            'user_id' => Yii::t('Backend', 'User ID'),
            'cash_control' => Yii::t('Backend', 'Cash Control'),
            'centralisation' => Yii::t('Backend', 'Centralisation'),
            'company_id' => Yii::t('Backend', 'Company ID'),
            'profit_account_id' => Yii::t('Backend', 'Profit Account ID'),
            'type' => Yii::t('Backend', 'Type'),
            'default_debit_account_id' => Yii::t('Backend', 'Default Debit Account ID'),
            'default_credit_account_id' => Yii::t('Backend', 'Default Credit Account ID'),
            'sequence_id' => Yii::t('Backend', 'Sequence ID'),
            'write_date' => Yii::t('Backend', 'Write Date'),
            'allow_date' => Yii::t('Backend', 'Allow Date'),
            'update_posted' => Yii::t('Backend', 'Update Posted'),
            'name' => Yii::t('Backend', 'Name'),
            'analytic_journal_id' => Yii::t('Backend', 'Analytic Journal ID'),
            'with_last_closing_balance' => Yii::t('Backend', 'With Last Closing Balance'),
            'entry_posted' => Yii::t('Backend', 'Entry Posted'),
            'group_invoice_lines' => Yii::t('Backend', 'Group Invoice Lines'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAccountTypeRels()
    {
        return $this->hasMany(AccountAccountTypeRel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAgedTrialBalanceJournalRels()
    {
        return $this->hasMany(AccountAgedTrialBalanceJournalRel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAutomaticReconciles()
    {
        return $this->hasMany(AccountAutomaticReconcile::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBalanceReportJournalRels()
    {
        return $this->hasMany(AccountBalanceReportJournalRel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBankStatements()
    {
        return $this->hasMany(AccountBankStatement::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBankStatementLines()
    {
        return $this->hasMany(AccountBankStatementLine::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCentralJournalJournalRels()
    {
        return $this->hasMany(AccountCentralJournalJournalRel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonAccountReportAccountJournalRels()
    {
        return $this->hasMany(AccountCommonAccountReportAccountJournalRel::className(), ['account_journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonJournalReportAccountJournalRels()
    {
        return $this->hasMany(AccountCommonJournalReportAccountJournalRel::className(), ['account_journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonPartnerReportAccountJournalRels()
    {
        return $this->hasMany(AccountCommonPartnerReportAccountJournalRel::className(), ['account_journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonReportAccountJournalRels()
    {
        return $this->hasMany(AccountCommonReportAccountJournalRel::className(), ['account_journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountConfigSettings()
    {
        return $this->hasMany(AccountConfigSettings::className(), ['sale_journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountConfigSettings0()
    {
        return $this->hasMany(AccountConfigSettings::className(), ['purchase_journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountConfigSettings1()
    {
        return $this->hasMany(AccountConfigSettings::className(), ['sale_refund_journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountConfigSettings2()
    {
        return $this->hasMany(AccountConfigSettings::className(), ['purchase_refund_journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalyearCloses()
    {
        return $this->hasMany(AccountFiscalyearClose::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountGeneralJournalJournalRels()
    {
        return $this->hasMany(AccountGeneralJournalJournalRel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoices()
    {
        return $this->hasMany(AccountInvoice::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceRefunds()
    {
        return $this->hasMany(AccountInvoiceRefund::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLossAccount()
    {
        return $this->hasOne(AccountAccount::className(), ['id' => 'loss_account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInternalAccount()
    {
        return $this->hasOne(AccountAccount::className(), ['id' => 'internal_account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfitAccount()
    {
        return $this->hasOne(AccountAccount::className(), ['id' => 'profit_account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefaultDebitAccount()
    {
        return $this->hasOne(AccountAccount::className(), ['id' => 'default_debit_account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefaultCreditAccount()
    {
        return $this->hasOne(AccountAccount::className(), ['id' => 'default_credit_account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnalyticJournal()
    {
        return $this->hasOne(AccountAnalyticJournal::className(), ['id' => 'analytic_journal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSequence()
    {
        return $this->hasOne(IrSequence::className(), ['id' => 'sequence_id']);
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
    public function getCurrency0()
    {
        return $this->hasOne(ResCurrency::className(), ['id' => 'currency']);
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
    public function getAccountJournalAccountVatDeclarationRels()
    {
        return $this->hasMany(AccountJournalAccountVatDeclarationRel::className(), ['account_journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournalAccountingReportRels()
    {
        return $this->hasMany(AccountJournalAccountingReportRel::className(), ['account_journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournalCashboxLines()
    {
        return $this->hasMany(AccountJournalCashboxLine::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournalGroupRels()
    {
        return $this->hasMany(AccountJournalGroupRel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournalPeriods()
    {
        return $this->hasMany(AccountJournalPeriod::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournalTypeRels()
    {
        return $this->hasMany(AccountJournalTypeRel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountModels()
    {
        return $this->hasMany(AccountModel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoves()
    {
        return $this->hasMany(AccountMove::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveBankReconciles()
    {
        return $this->hasMany(AccountMoveBankReconcile::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLines()
    {
        return $this->hasMany(AccountMoveLine::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLineReconcileWriteoffs()
    {
        return $this->hasMany(AccountMoveLineReconcileWriteoff::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPartnerBalanceJournalRels()
    {
        return $this->hasMany(AccountPartnerBalanceJournalRel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPartnerLedgerJournalRels()
    {
        return $this->hasMany(AccountPartnerLedgerJournalRel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPrintJournalJournalRels()
    {
        return $this->hasMany(AccountPrintJournalJournalRel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountReportGeneralLedgerJournalRels()
    {
        return $this->hasMany(AccountReportGeneralLedgerJournalRel::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVouchers()
    {
        return $this->hasMany(AccountVoucher::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartnerBanks()
    {
        return $this->hasMany(ResPartnerBank::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockInvoiceOnshippings()
    {
        return $this->hasMany(StockInvoiceOnshipping::className(), ['journal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWizardValidateAccountMoveJournals()
    {
        return $this->hasMany(WizardValidateAccountMoveJournal::className(), ['journal_id' => 'id']);
    }
}
