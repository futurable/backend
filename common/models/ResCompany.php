<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "res_company".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $partner_id
 * @property integer $currency_id
 * @property integer $create_uid
 * @property string $create_date
 * @property string $write_date
 * @property integer $write_uid
 * @property string $rml_footer
 * @property string $rml_header
 * @property string $rml_paper_format
 * @property resource $logo_web
 * @property integer $font
 * @property string $account_no
 * @property string $email
 * @property boolean $custom_footer
 * @property string $phone
 * @property string $rml_header2
 * @property string $rml_header3
 * @property string $rml_header1
 * @property string $company_registry
 * @property integer $paperformat_id
 * @property boolean $expects_chart_of_accounts
 * @property string $paypal_account
 * @property string $overdue_msg
 * @property string $tax_calculation_rounding_method
 * @property boolean $vat_check_vies
 * @property integer $project_time_mode_id
 * @property double $schedule_range
 * @property double $po_lead
 * @property double $manufacturing_lead
 * @property integer $expense_currency_exchange_account_id
 * @property integer $income_currency_exchange_account_id
 * @property string $sale_note
 * @property double $security_lead
 *
 * @property PurchaseOrder[] $purchaseOrders
 * @property StockWarehouseOrderpoint[] $stockWarehouseOrderpoints
 * @property StockInventoryLine[] $stockInventoryLines
 * @property ProductSupplierinfo[] $productSupplierinfos
 * @property StockProductionLot[] $stockProductionLots
 * @property MrpBom[] $mrpBoms
 * @property AccountAnalyticAccount[] $accountAnalyticAccounts
 * @property IrSequence[] $irSequences
 * @property CrmPhonecall[] $crmPhonecalls
 * @property AccountInvoice[] $accountInvoices
 * @property AccountAccount[] $accountAccounts
 * @property AccountVoucherLine[] $accountVoucherLines
 * @property AccountJournalPeriod[] $accountJournalPeriods
 * @property PurchaseOrderLine[] $purchaseOrderLines
 * @property AccountJournal[] $accountJournals
 * @property WizardMultiChartsAccounts[] $wizardMultiChartsAccounts
 * @property AccountInvoiceLine[] $accountInvoiceLines
 * @property ResPartnerBank[] $resPartnerBanks
 * @property AccountTax[] $accountTaxes
 * @property AccountBankStatementLine[] $accountBankStatementLines
 * @property ResUsers $writeU
 * @property ProductUom $projectTimeMode
 * @property ResPartner $partner
 * @property ResCompany $parent
 * @property ResCompany[] $resCompanies
 * @property ReportPaperformat $paperformat
 * @property AccountAccount $incomeCurrencyExchangeAccount
 * @property ResFont $font0
 * @property AccountAccount $expenseCurrencyExchangeAccount
 * @property ResCurrency $currency
 * @property ResUsers $createU
 * @property ResUsers[] $resUsers
 * @property StockWarehouse[] $stockWarehouses
 * @property StockProductionLotRevision[] $stockProductionLotRevisions
 * @property SaleOrderLine[] $saleOrderLines
 * @property ResourceCalendar[] $resourceCalendars
 * @property ResourceResource[] $resourceResources
 * @property SaleOrder[] $saleOrders
 * @property ResourceCalendarLeaves[] $resourceCalendarLeaves
 * @property ResCompanyUsersRel[] $resCompanyUsersRels
 * @property ResCurrency[] $resCurrencies
 * @property StockPicking[] $stockPickings
 * @property StockLocation[] $stockLocations
 * @property StockMove[] $stockMoves
 * @property StockInventory[] $stockInventories
 * @property ProjectTaskWork[] $projectTaskWorks
 * @property ProjectTask[] $projectTasks
 * @property ProcurementOrder[] $procurementOrders
 * @property ProductPricelistVersion[] $productPricelistVersions
 * @property ProductPricelistItem[] $productPricelistItems
 * @property ProductPricelist[] $productPricelists
 * @property MrpRoutingWorkcenter[] $mrpRoutingWorkcenters
 * @property MultiCompanyDefault[] $multiCompanyDefaults
 * @property MrpRouting[] $mrpRoutings
 * @property MrpProduction[] $mrpProductions
 * @property IrValues[] $irValues
 * @property IrProperty[] $irProperties
 * @property IrDefault[] $irDefaults
 * @property IrAttachment[] $irAttachments
 * @property HrDepartment[] $hrDepartments
 * @property HrJob[] $hrJobs
 * @property CrmLead[] $crmLeads
 * @property AccountVoucher[] $accountVouchers
 * @property AccountTaxCode[] $accountTaxCodes
 * @property AccountModel[] $accountModels
 * @property AccountInstaller[] $accountInstallers
 * @property AccountInvoiceTax[] $accountInvoiceTaxes
 * @property ResPartner[] $resPartners
 * @property ProductTemplate[] $productTemplates
 * @property AccountFiscalPosition[] $accountFiscalPositions
 * @property AccountMoveLine[] $accountMoveLines
 * @property AccountConfigSettings[] $accountConfigSettings
 * @property AccountMove[] $accountMoves
 * @property AccountPeriod[] $accountPeriods
 * @property AccountFiscalyear[] $accountFiscalyears
 * @property AccountBankStatement[] $accountBankStatements
 * @property AccountAnalyticLine[] $accountAnalyticLines
 * @property AccountAnalyticJournal[] $accountAnalyticJournals
 */
class ResCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'res_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'partner_id', 'currency_id', 'rml_header', 'rml_paper_format', 'rml_header2', 'rml_header3', 'schedule_range', 'po_lead', 'manufacturing_lead', 'security_lead'], 'required'],
            [['parent_id', 'partner_id', 'currency_id', 'create_uid', 'write_uid', 'font', 'paperformat_id', 'project_time_mode_id', 'expense_currency_exchange_account_id', 'income_currency_exchange_account_id'], 'integer'],
            [['create_date', 'write_date'], 'safe'],
            [['rml_footer', 'rml_header', 'rml_paper_format', 'logo_web', 'rml_header2', 'rml_header3', 'overdue_msg', 'tax_calculation_rounding_method', 'sale_note'], 'string'],
            [['custom_footer', 'expects_chart_of_accounts', 'vat_check_vies'], 'boolean'],
            [['schedule_range', 'po_lead', 'manufacturing_lead', 'security_lead'], 'number'],
            [['name', 'paypal_account'], 'string', 'max' => 128],
            [['account_no', 'email', 'phone', 'company_registry'], 'string', 'max' => 64],
            [['rml_header1'], 'string', 'max' => 200],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'name' => Yii::t('Backend', 'Name'),
            'parent_id' => Yii::t('Backend', 'Parent ID'),
            'partner_id' => Yii::t('Backend', 'Partner ID'),
            'currency_id' => Yii::t('Backend', 'Currency ID'),
            'create_uid' => Yii::t('Backend', 'Create Uid'),
            'create_date' => Yii::t('Backend', 'Create Date'),
            'write_date' => Yii::t('Backend', 'Write Date'),
            'write_uid' => Yii::t('Backend', 'Write Uid'),
            'rml_footer' => Yii::t('Backend', 'Report Footer'),
            'rml_header' => Yii::t('Backend', 'RML Header'),
            'rml_paper_format' => Yii::t('Backend', 'Paper Format'),
            'logo_web' => Yii::t('Backend', 'Logo Web'),
            'font' => Yii::t('Backend', 'Font'),
            'account_no' => Yii::t('Backend', 'Account No.'),
            'email' => Yii::t('Backend', 'Email'),
            'custom_footer' => Yii::t('Backend', 'Custom Footer'),
            'phone' => Yii::t('Backend', 'Phone'),
            'rml_header2' => Yii::t('Backend', 'RML Internal Header'),
            'rml_header3' => Yii::t('Backend', 'RML Internal Header for Landscape Reports'),
            'rml_header1' => Yii::t('Backend', 'Company Tagline'),
            'company_registry' => Yii::t('Backend', 'Company Registry'),
            'paperformat_id' => Yii::t('Backend', 'Paper format'),
            'expects_chart_of_accounts' => Yii::t('Backend', 'Expects a Chart of Accounts'),
            'paypal_account' => Yii::t('Backend', 'Paypal Account'),
            'overdue_msg' => Yii::t('Backend', 'Overdue Payments Message'),
            'tax_calculation_rounding_method' => Yii::t('Backend', 'Tax Calculation Rounding Method'),
            'vat_check_vies' => Yii::t('Backend', 'VIES VAT Check'),
            'project_time_mode_id' => Yii::t('Backend', 'Project Time Unit'),
            'schedule_range' => Yii::t('Backend', 'Scheduler Range Days'),
            'po_lead' => Yii::t('Backend', 'Purchase Lead Time'),
            'manufacturing_lead' => Yii::t('Backend', 'Manufacturing Lead Time'),
            'expense_currency_exchange_account_id' => Yii::t('Backend', 'Loss Exchange Rate Account'),
            'income_currency_exchange_account_id' => Yii::t('Backend', 'Gain Exchange Rate Account'),
            'sale_note' => Yii::t('Backend', 'Default Terms and Conditions'),
            'security_lead' => Yii::t('Backend', 'Security Days'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockWarehouseOrderpoints()
    {
        return $this->hasMany(StockWarehouseOrderpoint::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockInventoryLines()
    {
        return $this->hasMany(StockInventoryLine::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSupplierinfos()
    {
        return $this->hasMany(ProductSupplierinfo::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockProductionLots()
    {
        return $this->hasMany(StockProductionLot::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpBoms()
    {
        return $this->hasMany(MrpBom::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticAccounts()
    {
        return $this->hasMany(AccountAnalyticAccount::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrSequences()
    {
        return $this->hasMany(IrSequence::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmPhonecalls()
    {
        return $this->hasMany(CrmPhonecall::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoices()
    {
        return $this->hasMany(AccountInvoice::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAccounts()
    {
        return $this->hasMany(AccountAccount::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVoucherLines()
    {
        return $this->hasMany(AccountVoucherLine::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournalPeriods()
    {
        return $this->hasMany(AccountJournalPeriod::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrderLines()
    {
        return $this->hasMany(PurchaseOrderLine::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournals()
    {
        return $this->hasMany(AccountJournal::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWizardMultiChartsAccounts()
    {
        return $this->hasMany(WizardMultiChartsAccounts::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceLines()
    {
        return $this->hasMany(AccountInvoiceLine::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartnerBanks()
    {
        return $this->hasMany(ResPartnerBank::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTaxes()
    {
        return $this->hasMany(AccountTax::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBankStatementLines()
    {
        return $this->hasMany(AccountBankStatementLine::className(), ['company_id' => 'id']);
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
    public function getProjectTimeMode()
    {
        return $this->hasOne(ProductUom::className(), ['id' => 'project_time_mode_id']);
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
    public function getParent()
    {
        return $this->hasOne(ResCompany::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCompanies()
    {
        return $this->hasMany(ResCompany::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaperformat()
    {
        return $this->hasOne(ReportPaperformat::className(), ['id' => 'paperformat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncomeCurrencyExchangeAccount()
    {
        return $this->hasOne(AccountAccount::className(), ['id' => 'income_currency_exchange_account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFont0()
    {
        return $this->hasOne(ResFont::className(), ['id' => 'font']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpenseCurrencyExchangeAccount()
    {
        return $this->hasOne(AccountAccount::className(), ['id' => 'expense_currency_exchange_account_id']);
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
    public function getResUsers()
    {
        return $this->hasMany(ResUsers::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockWarehouses()
    {
        return $this->hasMany(StockWarehouse::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockProductionLotRevisions()
    {
        return $this->hasMany(StockProductionLotRevision::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrderLines()
    {
        return $this->hasMany(SaleOrderLine::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceCalendars()
    {
        return $this->hasMany(ResourceCalendar::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceResources()
    {
        return $this->hasMany(ResourceResource::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrders()
    {
        return $this->hasMany(SaleOrder::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceCalendarLeaves()
    {
        return $this->hasMany(ResourceCalendarLeaves::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCompanyUsersRels()
    {
        return $this->hasMany(ResCompanyUsersRel::className(), ['cid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCurrencies()
    {
        return $this->hasMany(ResCurrency::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockPickings()
    {
        return $this->hasMany(StockPicking::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockLocations()
    {
        return $this->hasMany(StockLocation::className(), ['chained_company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockMoves()
    {
        return $this->hasMany(StockMove::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockInventories()
    {
        return $this->hasMany(StockInventory::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTaskWorks()
    {
        return $this->hasMany(ProjectTaskWork::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTasks()
    {
        return $this->hasMany(ProjectTask::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcurementOrders()
    {
        return $this->hasMany(ProcurementOrder::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricelistVersions()
    {
        return $this->hasMany(ProductPricelistVersion::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricelistItems()
    {
        return $this->hasMany(ProductPricelistItem::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricelists()
    {
        return $this->hasMany(ProductPricelist::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpRoutingWorkcenters()
    {
        return $this->hasMany(MrpRoutingWorkcenter::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMultiCompanyDefaults()
    {
        return $this->hasMany(MultiCompanyDefault::className(), ['company_dest_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpRoutings()
    {
        return $this->hasMany(MrpRouting::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpProductions()
    {
        return $this->hasMany(MrpProduction::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrValues()
    {
        return $this->hasMany(IrValues::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrProperties()
    {
        return $this->hasMany(IrProperty::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrDefaults()
    {
        return $this->hasMany(IrDefault::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrAttachments()
    {
        return $this->hasMany(IrAttachment::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrDepartments()
    {
        return $this->hasMany(HrDepartment::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrJobs()
    {
        return $this->hasMany(HrJob::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmLeads()
    {
        return $this->hasMany(CrmLead::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVouchers()
    {
        return $this->hasMany(AccountVoucher::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTaxCodes()
    {
        return $this->hasMany(AccountTaxCode::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountModels()
    {
        return $this->hasMany(AccountModel::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInstallers()
    {
        return $this->hasMany(AccountInstaller::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceTaxes()
    {
        return $this->hasMany(AccountInvoiceTax::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartners()
    {
        return $this->hasMany(ResPartner::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTemplates()
    {
        return $this->hasMany(ProductTemplate::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalPositions()
    {
        return $this->hasMany(AccountFiscalPosition::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLines()
    {
        return $this->hasMany(AccountMoveLine::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountConfigSettings()
    {
        return $this->hasMany(AccountConfigSettings::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoves()
    {
        return $this->hasMany(AccountMove::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPeriods()
    {
        return $this->hasMany(AccountPeriod::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalyears()
    {
        return $this->hasMany(AccountFiscalyear::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBankStatements()
    {
        return $this->hasMany(AccountBankStatement::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticLines()
    {
        return $this->hasMany(AccountAnalyticLine::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticJournals()
    {
        return $this->hasMany(AccountAnalyticJournal::className(), ['company_id' => 'id']);
    }
}
