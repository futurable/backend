<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "res_users".
 *
 * @property integer $id
 * @property boolean $active
 * @property string $login
 * @property string $password
 * @property integer $company_id
 * @property integer $partner_id
 * @property integer $create_uid
 * @property string $create_date
 * @property string $write_date
 * @property integer $write_uid
 * @property integer $menu_id
 * @property string $login_date
 * @property string $signature
 * @property integer $action_id
 * @property integer $alias_id
 * @property boolean $display_groups_suggestions
 * @property boolean $share
 * @property integer $default_section_id
 * @property boolean $display_employees_suggestions
 *
 * @property WkfTransition[] $wkfTransitions
 * @property PurchaseOrder[] $purchaseOrders
 * @property StockWarehouseOrderpoint[] $stockWarehouseOrderpoints
 * @property StockInventoryLine[] $stockInventoryLines
 * @property StockPartialMoveLine[] $stockPartialMoveLines
 * @property CrmCaseSection[] $crmCaseSections
 * @property StockMoveSplitLines[] $stockMoveSplitLines
 * @property StockReturnPickingMemory[] $stockReturnPickingMemories
 * @property ResPartnerCategory[] $resPartnerCategories
 * @property ProductSupplierinfo[] $productSupplierinfos
 * @property ProjectTaskDelegate[] $projectTaskDelegates
 * @property ProcessCondition[] $processConditions
 * @property ResBank[] $resBanks
 * @property PortalWizardUser[] $portalWizardUsers
 * @property ResCountry[] $resCountries
 * @property MrpWorkcenter[] $mrpWorkcenters
 * @property StockProductionLot[] $stockProductionLots
 * @property IrUiView[] $irUiViews
 * @property StockIncoterms[] $stockIncoterms
 * @property ProductUl[] $productUls
 * @property CrmLead2opportunityPartnerMass[] $crmLead2opportunityPartnerMasses
 * @property IrActWindowView[] $irActWindowViews
 * @property ResPartnerBankTypeField[] $resPartnerBankTypeFields
 * @property ProductCategory[] $productCategories
 * @property CrmLead2opportunityPartnerMassResUsersRel[] $crmLead2opportunityPartnerMassResUsersRels
 * @property MailWizardInvite[] $mailWizardInvites
 * @property EmailTemplatePreview[] $emailTemplatePreviews
 * @property MrpBom[] $mrpBoms
 * @property MailComposeMessage[] $mailComposeMessages
 * @property IrUiMenu[] $irUiMenus
 * @property IrFilters[] $irFilters
 * @property IrModel[] $irModels
 * @property AccountAnalyticAccount[] $accountAnalyticAccounts
 * @property CalendarEvent[] $calendarEvents
 * @property IrSequence[] $irSequences
 * @property CrmPhonecall[] $crmPhonecalls
 * @property MailAlias[] $mailAliases
 * @property ChangePasswordUser[] $changePasswordUsers
 * @property AccountChartTemplate[] $accountChartTemplates
 * @property AccountInvoice[] $accountInvoices
 * @property BaseLanguageImport[] $baseLanguageImports
 * @property BasePartnerMergeAutomaticWizard[] $basePartnerMergeAutomaticWizards
 * @property BaseLanguageInstall[] $baseLanguageInstalls
 * @property AccountAccount[] $accountAccounts
 * @property BaseImportImport[] $baseImportImports
 * @property BaseImportTestsModelsM2o[] $baseImportTestsModelsM2os
 * @property AccountVoucherLine[] $accountVoucherLines
 * @property AccountTaxCodeTemplate[] $accountTaxCodeTemplates
 * @property AccountJournalPeriod[] $accountJournalPeriods
 * @property PurchaseOrderLine[] $purchaseOrderLines
 * @property AccountJournal[] $accountJournals
 * @property WizardMultiChartsAccounts[] $wizardMultiChartsAccounts
 * @property AccountInvoiceLine[] $accountInvoiceLines
 * @property ResPartnerBank[] $resPartnerBanks
 * @property AccountAccountTemplate[] $accountAccountTemplates
 * @property AccountTax[] $accountTaxes
 * @property AccountAccountType[] $accountAccountTypes
 * @property AccountTaxTemplate[] $accountTaxTemplates
 * @property BaseImportTestsModelsM2oRequired[] $baseImportTestsModelsM2oRequireds
 * @property AccountBankStatementLine[] $accountBankStatementLines
 * @property AccountPaymentTermLine[] $accountPaymentTermLines
 * @property AccountFiscalPositionAccount[] $accountFiscalPositionAccounts
 * @property AccountModelLine[] $accountModelLines
 * @property AccountFiscalPositionAccountTemplate[] $accountFiscalPositionAccountTemplates
 * @property AccountFinancialReport[] $accountFinancialReports
 * @property ResCompany[] $resCompanies
 * @property ResUsers $writeU
 * @property ResUsers[] $resUsers
 * @property ResPartner $partner
 * @property CrmCaseSection $defaultSection
 * @property ResUsers $createU
 * @property ResCompany $company
 * @property MailAlias $alias
 * @property WkfActivity[] $wkfActivities
 * @property Wkf[] $wkfs
 * @property ValidateAccountMove[] $validateAccountMoves
 * @property ValidateAccountMoveLines[] $validateAccountMoveLines
 * @property StockTracking[] $stockTrackings
 * @property WkfLogs[] $wkfLogs
 * @property StockReturnPicking[] $stockReturnPickings
 * @property StockWarehouse[] $stockWarehouses
 * @property StockSplitInto[] $stockSplitIntos
 * @property WizardIrModelMenuCreate[] $wizardIrModelMenuCreates
 * @property StockProductionLotRevision[] $stockProductionLotRevisions
 * @property StockMoveConsume[] $stockMoveConsumes
 * @property StockInvoiceOnshipping[] $stockInvoiceOnshippings
 * @property StockJournal[] $stockJournals
 * @property StockPartialPicking[] $stockPartialPickings
 * @property StockPartialMove[] $stockPartialMoves
 * @property StockPartialPickingLine[] $stockPartialPickingLines
 * @property StockMoveSplit[] $stockMoveSplits
 * @property StockMoveScrap[] $stockMoveScraps
 * @property StockLocationProduct[] $stockLocationProducts
 * @property StockInventoryMerge[] $stockInventoryMerges
 * @property SaleOrderLine[] $saleOrderLines
 * @property StockConfigSettings[] $stockConfigSettings
 * @property StockChangeProductQty[] $stockChangeProductQties
 * @property ShareWizardResultLine[] $shareWizardResultLines
 * @property ShareWizardResUserRel[] $shareWizardResUserRels
 * @property SaleOrderLineMakeInvoice[] $saleOrderLineMakeInvoices
 * @property StockInventoryLineSplit[] $stockInventoryLineSplits
 * @property StockInventoryLineSplitLines[] $stockInventoryLineSplitLines
 * @property StockFillInventory[] $stockFillInventories
 * @property StockChangeStandardPrice[] $stockChangeStandardPrices
 * @property ShareWizard[] $shareWizards
 * @property SaleMemberRel[] $saleMemberRels
 * @property SaleMakeInvoice[] $saleMakeInvoices
 * @property ResourceCalendar[] $resourceCalendars
 * @property ResRequestLink[] $resRequestLinks
 * @property ResourceCalendarAttendance[] $resourceCalendarAttendances
 * @property ResPartnerBankType[] $resPartnerBankTypes
 * @property ResourceResource[] $resourceResources
 * @property SaleOrder[] $saleOrders
 * @property SaleConfigSettings[] $saleConfigSettings
 * @property ResourceCalendarLeaves[] $resourceCalendarLeaves
 * @property SaleAdvancePaymentInv[] $saleAdvancePaymentInvs
 * @property ResPartnerTitle[] $resPartnerTitles
 * @property ResGroups[] $resGroups
 * @property ResGroupsUsersRel[] $resGroupsUsersRels
 * @property ResConfigSettings[] $resConfigSettings
 * @property ResConfigInstaller[] $resConfigInstallers
 * @property ResConfig[] $resConfigs
 * @property ResCompanyUsersRel[] $resCompanyUsersRels
 * @property ResCurrency[] $resCurrencies
 * @property ResFont[] $resFonts
 * @property ResCurrencyRateType[] $resCurrencyRateTypes
 * @property ResLang[] $resLangs
 * @property ResCountryState[] $resCountryStates
 * @property Report[] $reports
 * @property PurchaseOrderLineInvoice[] $purchaseOrderLineInvoices
 * @property PurchaseOrderGroup[] $purchaseOrderGroups
 * @property TempRange[] $tempRanges
 * @property StockPicking[] $stockPickings
 * @property StockLocation[] $stockLocations
 * @property StockMove[] $stockMoves
 * @property StockInventory[] $stockInventories
 * @property ReportPaperformat[] $reportPaperformats
 * @property PublisherWarrantyContract[] $publisherWarrantyContracts
 * @property ProjectTaskWork[] $projectTaskWorks
 * @property ProjectConfigSettings[] $projectConfigSettings
 * @property ProjectAccountAnalyticLine[] $projectAccountAnalyticLines
 * @property ProductUomCateg[] $productUomCategs
 * @property ProjectProject[] $projectProjects
 * @property PurchaseConfigSettings[] $purchaseConfigSettings
 * @property ProjectTaskHistory[] $projectTaskHistories
 * @property ProjectTaskType[] $projectTaskTypes
 * @property ProjectUserRel[] $projectUserRels
 * @property ProjectCategory[] $projectCategories
 * @property ProjectTask[] $projectTasks
 * @property ProductPricelistType[] $productPricelistTypes
 * @property ProductPublicCategory[] $productPublicCategories
 * @property ProcurementOrderpointCompute[] $procurementOrderpointComputes
 * @property ProcurementOrderCompute[] $procurementOrderComputes
 * @property ProcurementOrderComputeAll[] $procurementOrderComputeAlls
 * @property ProcurementOrder[] $procurementOrders
 * @property ProductPricelistVersion[] $productPricelistVersions
 * @property ProductPriceType[] $productPriceTypes
 * @property ProductPackaging[] $productPackagings
 * @property ProductPricelistItem[] $productPricelistItems
 * @property ProductPriceList[] $productPriceLists
 * @property ProductPricelist[] $productPricelists
 * @property OsvMemoryAutovacuum[] $osvMemoryAutovacuums
 * @property PricelistPartnerinfo[] $pricelistPartnerinfos
 * @property MrpRoutingWorkcenter[] $mrpRoutingWorkcenters
 * @property ProcessTransition[] $processTransitions
 * @property ProcessProcess[] $processProcesses
 * @property ProcessTransitionAction[] $processTransitionActions
 * @property ProcessNode[] $processNodes
 * @property PortalWizard[] $portalWizards
 * @property MultiCompanyDefault[] $multiCompanyDefaults
 * @property MrpWorkcenterLoad[] $mrpWorkcenterLoads
 * @property MrpProductPrice[] $mrpProductPrices
 * @property MakeProcurement[] $makeProcurements
 * @property MrpRouting[] $mrpRoutings
 * @property MrpConfigSettings[] $mrpConfigSettings
 * @property MrpProperty[] $mrpProperties
 * @property MrpProductionWorkcenterLine[] $mrpProductionWorkcenterLines
 * @property MrpPropertyGroup[] $mrpPropertyGroups
 * @property MrpProductionProductLine[] $mrpProductionProductLines
 * @property MrpProductProduce[] $mrpProductProduces
 * @property MrpProduction[] $mrpProductions
 * @property MailMessage[] $mailMessages
 * @property MailVote[] $mailVotes
 * @property MailMail[] $mailMails
 * @property IrUiViewCustom[] $irUiViewCustoms
 * @property IrValues[] $irValues
 * @property MailMessageSubtype[] $mailMessageSubtypes
 * @property MailGroup[] $mailGroups
 * @property IrSequenceType[] $irSequenceTypes
 * @property IrServerObjectLines[] $irServerObjectLines
 * @property IrMailServer[] $irMailServers
 * @property IrModuleModule[] $irModuleModules
 * @property IrRule[] $irRules
 * @property IrModuleCategory[] $irModuleCategories
 * @property IrProperty[] $irProperties
 * @property IrModelFields[] $irModelFields
 * @property IrModuleModuleDependency[] $irModuleModuleDependencies
 * @property IrModelAccess[] $irModelAccesses
 * @property IrFieldsConverter[] $irFieldsConverters
 * @property IrActionsTodo[] $irActionsTodos
 * @property IrExports[] $irExports
 * @property IrDefault[] $irDefaults
 * @property IrLogging[] $irLoggings
 * @property IrCron[] $irCrons
 * @property IrExportsLine[] $irExportsLines
 * @property IrConfigParameter[] $irConfigParameters
 * @property IrAttachment[] $irAttachments
 * @property HrConfigSettings[] $hrConfigSettings
 * @property FetchmailConfigSettings[] $fetchmailConfigSettings
 * @property HrEmployee[] $hrEmployees
 * @property EmailTemplate[] $emailTemplates
 * @property IrActions[] $irActions
 * @property HrDepartment[] $hrDepartments
 * @property HrEmployeeCategory[] $hrEmployeeCategories
 * @property HrJob[] $hrJobs
 * @property FetchmailServer[] $fetchmailServers
 * @property DecimalPrecision[] $decimalPrecisions
 * @property CrmPartnerBinding[] $crmPartnerBindings
 * @property CrmMakeSale[] $crmMakeSales
 * @property CrmLead2opportunityPartner[] $crmLead2opportunityPartners
 * @property CrmSegmentation[] $crmSegmentations
 * @property DecimalPrecisionTest[] $decimalPrecisionTests
 * @property CrmMergeOpportunity[] $crmMergeOpportunities
 * @property CrmSegmentationLine[] $crmSegmentationLines
 * @property CrmPhonecall2phonecall[] $crmPhonecall2phonecalls
 * @property CrmPaymentMode[] $crmPaymentModes
 * @property CrmOpportunity2phonecall[] $crmOpportunity2phonecalls
 * @property CrmCaseCateg[] $crmCaseCategs
 * @property CalendarEventType[] $calendarEventTypes
 * @property ChangePasswordWizard[] $changePasswordWizards
 * @property CrmCaseResourceType[] $crmCaseResourceTypes
 * @property CrmCaseChannel[] $crmCaseChannels
 * @property ChangeProductionQty[] $changeProductionQties
 * @property CrmCaseStage[] $crmCaseStages
 * @property CashBoxOut[] $cashBoxOuts
 * @property CashBoxIn[] $cashBoxIns
 * @property CrmLead[] $crmLeads
 * @property CalendarContacts[] $calendarContacts
 * @property BaseModuleConfiguration[] $baseModuleConfigurations
 * @property CalendarAlarm[] $calendarAlarms
 * @property CalendarAttendee[] $calendarAttendees
 * @property BaseUpdateTranslations[] $baseUpdateTranslations
 * @property BaseSetupTerminology[] $baseSetupTerminologies
 * @property BoardCreate[] $boardCreates
 * @property BasePartnerMergeLine[] $basePartnerMergeLines
 * @property BaseModuleUpgrade[] $baseModuleUpgrades
 * @property BaseModuleUpdate[] $baseModuleUpdates
 * @property BaseModuleImport[] $baseModuleImports
 * @property BaseLanguageExport[] $baseLanguageExports
 * @property BaseImportTestsModelsM2oRequiredRelated[] $baseImportTestsModelsM2oRequiredRelateds
 * @property BaseImportTestsModelsO2m[] $baseImportTestsModelsO2ms
 * @property BaseImportTestsModelsM2oRelated[] $baseImportTestsModelsM2oRelateds
 * @property BaseImportTestsModelsO2mChild[] $baseImportTestsModelsO2mChildren
 * @property BaseImportTestsModelsChar[] $baseImportTestsModelsChars
 * @property BaseImportTestsModelsPreview[] $baseImportTestsModelsPreviews
 * @property BaseImportTestsModelsCharStillreadonly[] $baseImportTestsModelsCharStillreadonlies
 * @property BaseImportTestsModelsCharStates[] $baseImportTestsModelsCharStates
 * @property BaseImportTestsModelsCharRequired[] $baseImportTestsModelsCharRequireds
 * @property BaseImportTestsModelsCharReadonly[] $baseImportTestsModelsCharReadonlies
 * @property BaseImportTestsModelsCharNoreadonly[] $baseImportTestsModelsCharNoreadonlies
 * @property BaseActionRule[] $baseActionRules
 * @property AccountVatDeclaration[] $accountVatDeclarations
 * @property AccountUnreconcileReconcile[] $accountUnreconcileReconciles
 * @property AccountUnreconcile[] $accountUnreconciles
 * @property ActionTraceability[] $actionTraceabilities
 * @property BaseConfigSettings[] $baseConfigSettings
 * @property BaseActionRuleLeadTest[] $baseActionRuleLeadTests
 * @property AccountUseModel[] $accountUseModels
 * @property AccountVoucher[] $accountVouchers
 * @property AccountingReport[] $accountingReports
 * @property AccountSubscriptionGenerate[] $accountSubscriptionGenerates
 * @property AccountStateOpen[] $accountStateOpens
 * @property AccountReportGeneralLedger[] $accountReportGeneralLedgers
 * @property AccountTaxChart[] $accountTaxCharts
 * @property AccountStatementFromInvoiceLines[] $accountStatementFromInvoiceLines
 * @property AccountPeriodClose[] $accountPeriodCloses
 * @property AccountPaymentTerm[] $accountPaymentTerms
 * @property AccountTaxCode[] $accountTaxCodes
 * @property AccountPrintJournal[] $accountPrintJournals
 * @property AccountSubscription[] $accountSubscriptions
 * @property AccountSubscriptionLine[] $accountSubscriptionLines
 * @property AccountSequenceFiscalyear[] $accountSequenceFiscalyears
 * @property AccountPartnerLedger[] $accountPartnerLedgers
 * @property AccountPartnerBalance[] $accountPartnerBalances
 * @property AccountOpenClosedFiscalyear[] $accountOpenClosedFiscalyears
 * @property AccountMoveLineUnreconcileSelect[] $accountMoveLineUnreconcileSelects
 * @property AccountMoveLineReconcile[] $accountMoveLineReconciles
 * @property AccountMoveReconcile[] $accountMoveReconciles
 * @property AccountJournalSelect[] $accountJournalSelects
 * @property AccountMoveLineReconcileWriteoff[] $accountMoveLineReconcileWriteoffs
 * @property AccountMoveBankReconcile[] $accountMoveBankReconciles
 * @property AccountPartnerReconcileProcess[] $accountPartnerReconcileProcesses
 * @property AccountMoveLineReconcileSelect[] $accountMoveLineReconcileSelects
 * @property AccountModel[] $accountModels
 * @property AccountInvoiceCancel[] $accountInvoiceCancels
 * @property AccountInvoiceConfirm[] $accountInvoiceConfirms
 * @property AccountInstaller[] $accountInstallers
 * @property ProductUom[] $productUoms
 * @property AccountInvoiceTax[] $accountInvoiceTaxes
 * @property ProductProduct[] $productProducts
 * @property ResCurrencyRate[] $resCurrencyRates
 * @property ResPartner[] $resPartners
 * @property ProductTemplate[] $productTemplates
 * @property AccountInvoiceRefund[] $accountInvoiceRefunds
 * @property AccountJournalCashboxLine[] $accountJournalCashboxLines
 * @property AccountFiscalPosition[] $accountFiscalPositions
 * @property AccountGeneralJournal[] $accountGeneralJournals
 * @property AccountMoveLine[] $accountMoveLines
 * @property AccountConfigSettings[] $accountConfigSettings
 * @property AccountMove[] $accountMoves
 * @property AccountPeriod[] $accountPeriods
 * @property AccountFiscalyear[] $accountFiscalyears
 * @property AccountFiscalPositionTemplate[] $accountFiscalPositionTemplates
 * @property AccountFiscalPositionTax[] $accountFiscalPositionTaxes
 * @property AccountFiscalyearClose[] $accountFiscalyearCloses
 * @property AccountFiscalPositionTaxTemplate[] $accountFiscalPositionTaxTemplates
 * @property AccountFiscalyearCloseState[] $accountFiscalyearCloseStates
 * @property AccountBankStatement[] $accountBankStatements
 * @property AccountCommonReport[] $accountCommonReports
 * @property AccountCommonPartnerReport[] $accountCommonPartnerReports
 * @property AccountCommonJournalReport[] $accountCommonJournalReports
 * @property AccountChart[] $accountCharts
 * @property AccountCentralJournal[] $accountCentralJournals
 * @property AccountCommonAccountReport[] $accountCommonAccountReports
 * @property AccountChangeCurrency[] $accountChangeCurrencies
 * @property AccountCashboxLine[] $accountCashboxLines
 * @property AccountBankAccountsWizard[] $accountBankAccountsWizards
 * @property AccountBalanceReport[] $accountBalanceReports
 * @property AccountAnalyticLine[] $accountAnalyticLines
 * @property AccountAnalyticInvertedBalance[] $accountAnalyticInvertedBalances
 * @property AccountAnalyticJournal[] $accountAnalyticJournals
 * @property AccountAnalyticCostLedger[] $accountAnalyticCostLedgers
 * @property AccountAnalyticChart[] $accountAnalyticCharts
 * @property AccountAgedTrialBalance[] $accountAgedTrialBalances
 * @property AccountAddtmplWizard[] $accountAddtmplWizards
 * @property AccountAnalyticCostLedgerJournalReport[] $accountAnalyticCostLedgerJournalReports
 * @property AccountAutomaticReconcile[] $accountAutomaticReconciles
 * @property AccountAnalyticBalance[] $accountAnalyticBalances
 * @property AccountAnalyticJournalReport[] $accountAnalyticJournalReports
 */
class ResUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'res_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'display_groups_suggestions', 'share', 'display_employees_suggestions'], 'boolean'],
            [['login', 'company_id', 'partner_id', 'alias_id'], 'required'],
            [['company_id', 'partner_id', 'create_uid', 'write_uid', 'menu_id', 'action_id', 'alias_id', 'default_section_id'], 'integer'],
            [['create_date', 'write_date', 'signature'], 'string'],
            [['login_date'], 'safe'],
            [['login', 'password'], 'string', 'max' => 64],
            [['login'], 'unique'],
            [['login'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'active' => Yii::t('Backend', 'Active'),
            'login' => Yii::t('Backend', 'Login'),
            'password' => Yii::t('Backend', 'Password'),
            'company_id' => Yii::t('Backend', 'Company ID'),
            'partner_id' => Yii::t('Backend', 'Partner ID'),
            'create_uid' => Yii::t('Backend', 'Create Uid'),
            'create_date' => Yii::t('Backend', 'Create Date'),
            'write_date' => Yii::t('Backend', 'Write Date'),
            'write_uid' => Yii::t('Backend', 'Write Uid'),
            'menu_id' => Yii::t('Backend', 'Menu Action'),
            'login_date' => Yii::t('Backend', 'Latest connection'),
            'signature' => Yii::t('Backend', 'Signature'),
            'action_id' => Yii::t('Backend', 'Home Action'),
            'alias_id' => Yii::t('Backend', 'Alias'),
            'display_groups_suggestions' => Yii::t('Backend', 'Display Groups Suggestions'),
            'share' => Yii::t('Backend', 'Share User'),
            'default_section_id' => Yii::t('Backend', 'Default Sales Team'),
            'display_employees_suggestions' => Yii::t('Backend', 'Display Employees Suggestions'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWkfTransitions()
    {
        return $this->hasMany(WkfTransition::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockWarehouseOrderpoints()
    {
        return $this->hasMany(StockWarehouseOrderpoint::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockInventoryLines()
    {
        return $this->hasMany(StockInventoryLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockPartialMoveLines()
    {
        return $this->hasMany(StockPartialMoveLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmCaseSections()
    {
        return $this->hasMany(CrmCaseSection::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockMoveSplitLines()
    {
        return $this->hasMany(StockMoveSplitLines::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockReturnPickingMemories()
    {
        return $this->hasMany(StockReturnPickingMemory::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartnerCategories()
    {
        return $this->hasMany(ResPartnerCategory::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSupplierinfos()
    {
        return $this->hasMany(ProductSupplierinfo::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTaskDelegates()
    {
        return $this->hasMany(ProjectTaskDelegate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcessConditions()
    {
        return $this->hasMany(ProcessCondition::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResBanks()
    {
        return $this->hasMany(ResBank::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalWizardUsers()
    {
        return $this->hasMany(PortalWizardUser::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCountries()
    {
        return $this->hasMany(ResCountry::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpWorkcenters()
    {
        return $this->hasMany(MrpWorkcenter::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockProductionLots()
    {
        return $this->hasMany(StockProductionLot::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrUiViews()
    {
        return $this->hasMany(IrUiView::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockIncoterms()
    {
        return $this->hasMany(StockIncoterms::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductUls()
    {
        return $this->hasMany(ProductUl::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmLead2opportunityPartnerMasses()
    {
        return $this->hasMany(CrmLead2opportunityPartnerMass::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrActWindowViews()
    {
        return $this->hasMany(IrActWindowView::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartnerBankTypeFields()
    {
        return $this->hasMany(ResPartnerBankTypeField::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmLead2opportunityPartnerMassResUsersRels()
    {
        return $this->hasMany(CrmLead2opportunityPartnerMassResUsersRel::className(), ['res_users_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailWizardInvites()
    {
        return $this->hasMany(MailWizardInvite::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailTemplatePreviews()
    {
        return $this->hasMany(EmailTemplatePreview::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpBoms()
    {
        return $this->hasMany(MrpBom::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailComposeMessages()
    {
        return $this->hasMany(MailComposeMessage::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrUiMenus()
    {
        return $this->hasMany(IrUiMenu::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrFilters()
    {
        return $this->hasMany(IrFilters::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModels()
    {
        return $this->hasMany(IrModel::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticAccounts()
    {
        return $this->hasMany(AccountAnalyticAccount::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarEvents()
    {
        return $this->hasMany(CalendarEvent::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrSequences()
    {
        return $this->hasMany(IrSequence::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmPhonecalls()
    {
        return $this->hasMany(CrmPhonecall::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailAliases()
    {
        return $this->hasMany(MailAlias::className(), ['alias_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChangePasswordUsers()
    {
        return $this->hasMany(ChangePasswordUser::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountChartTemplates()
    {
        return $this->hasMany(AccountChartTemplate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoices()
    {
        return $this->hasMany(AccountInvoice::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseLanguageImports()
    {
        return $this->hasMany(BaseLanguageImport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasePartnerMergeAutomaticWizards()
    {
        return $this->hasMany(BasePartnerMergeAutomaticWizard::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseLanguageInstalls()
    {
        return $this->hasMany(BaseLanguageInstall::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAccounts()
    {
        return $this->hasMany(AccountAccount::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportImports()
    {
        return $this->hasMany(BaseImportImport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsM2os()
    {
        return $this->hasMany(BaseImportTestsModelsM2o::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVoucherLines()
    {
        return $this->hasMany(AccountVoucherLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTaxCodeTemplates()
    {
        return $this->hasMany(AccountTaxCodeTemplate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournalPeriods()
    {
        return $this->hasMany(AccountJournalPeriod::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrderLines()
    {
        return $this->hasMany(PurchaseOrderLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournals()
    {
        return $this->hasMany(AccountJournal::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWizardMultiChartsAccounts()
    {
        return $this->hasMany(WizardMultiChartsAccounts::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceLines()
    {
        return $this->hasMany(AccountInvoiceLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartnerBanks()
    {
        return $this->hasMany(ResPartnerBank::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAccountTemplates()
    {
        return $this->hasMany(AccountAccountTemplate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTaxes()
    {
        return $this->hasMany(AccountTax::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAccountTypes()
    {
        return $this->hasMany(AccountAccountType::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTaxTemplates()
    {
        return $this->hasMany(AccountTaxTemplate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsM2oRequireds()
    {
        return $this->hasMany(BaseImportTestsModelsM2oRequired::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBankStatementLines()
    {
        return $this->hasMany(AccountBankStatementLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPaymentTermLines()
    {
        return $this->hasMany(AccountPaymentTermLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalPositionAccounts()
    {
        return $this->hasMany(AccountFiscalPositionAccount::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountModelLines()
    {
        return $this->hasMany(AccountModelLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalPositionAccountTemplates()
    {
        return $this->hasMany(AccountFiscalPositionAccountTemplate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFinancialReports()
    {
        return $this->hasMany(AccountFinancialReport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCompanies()
    {
        return $this->hasMany(ResCompany::className(), ['create_uid' => 'id']);
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
    public function getResUsers()
    {
        return $this->hasMany(ResUsers::className(), ['create_uid' => 'id']);
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
    public function getDefaultSection()
    {
        return $this->hasOne(CrmCaseSection::className(), ['id' => 'default_section_id']);
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
    public function getAlias()
    {
        return $this->hasOne(MailAlias::className(), ['id' => 'alias_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWkfActivities()
    {
        return $this->hasMany(WkfActivity::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWkfs()
    {
        return $this->hasMany(Wkf::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValidateAccountMoves()
    {
        return $this->hasMany(ValidateAccountMove::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValidateAccountMoveLines()
    {
        return $this->hasMany(ValidateAccountMoveLines::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockTrackings()
    {
        return $this->hasMany(StockTracking::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWkfLogs()
    {
        return $this->hasMany(WkfLogs::className(), ['uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockReturnPickings()
    {
        return $this->hasMany(StockReturnPicking::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockWarehouses()
    {
        return $this->hasMany(StockWarehouse::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockSplitIntos()
    {
        return $this->hasMany(StockSplitInto::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWizardIrModelMenuCreates()
    {
        return $this->hasMany(WizardIrModelMenuCreate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockProductionLotRevisions()
    {
        return $this->hasMany(StockProductionLotRevision::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockMoveConsumes()
    {
        return $this->hasMany(StockMoveConsume::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockInvoiceOnshippings()
    {
        return $this->hasMany(StockInvoiceOnshipping::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockJournals()
    {
        return $this->hasMany(StockJournal::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockPartialPickings()
    {
        return $this->hasMany(StockPartialPicking::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockPartialMoves()
    {
        return $this->hasMany(StockPartialMove::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockPartialPickingLines()
    {
        return $this->hasMany(StockPartialPickingLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockMoveSplits()
    {
        return $this->hasMany(StockMoveSplit::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockMoveScraps()
    {
        return $this->hasMany(StockMoveScrap::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockLocationProducts()
    {
        return $this->hasMany(StockLocationProduct::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockInventoryMerges()
    {
        return $this->hasMany(StockInventoryMerge::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrderLines()
    {
        return $this->hasMany(SaleOrderLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockConfigSettings()
    {
        return $this->hasMany(StockConfigSettings::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockChangeProductQties()
    {
        return $this->hasMany(StockChangeProductQty::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShareWizardResultLines()
    {
        return $this->hasMany(ShareWizardResultLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShareWizardResUserRels()
    {
        return $this->hasMany(ShareWizardResUserRel::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrderLineMakeInvoices()
    {
        return $this->hasMany(SaleOrderLineMakeInvoice::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockInventoryLineSplits()
    {
        return $this->hasMany(StockInventoryLineSplit::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockInventoryLineSplitLines()
    {
        return $this->hasMany(StockInventoryLineSplitLines::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockFillInventories()
    {
        return $this->hasMany(StockFillInventory::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockChangeStandardPrices()
    {
        return $this->hasMany(StockChangeStandardPrice::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShareWizards()
    {
        return $this->hasMany(ShareWizard::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleMemberRels()
    {
        return $this->hasMany(SaleMemberRel::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleMakeInvoices()
    {
        return $this->hasMany(SaleMakeInvoice::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceCalendars()
    {
        return $this->hasMany(ResourceCalendar::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResRequestLinks()
    {
        return $this->hasMany(ResRequestLink::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceCalendarAttendances()
    {
        return $this->hasMany(ResourceCalendarAttendance::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartnerBankTypes()
    {
        return $this->hasMany(ResPartnerBankType::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceResources()
    {
        return $this->hasMany(ResourceResource::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrders()
    {
        return $this->hasMany(SaleOrder::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleConfigSettings()
    {
        return $this->hasMany(SaleConfigSettings::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceCalendarLeaves()
    {
        return $this->hasMany(ResourceCalendarLeaves::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleAdvancePaymentInvs()
    {
        return $this->hasMany(SaleAdvancePaymentInv::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartnerTitles()
    {
        return $this->hasMany(ResPartnerTitle::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResGroups()
    {
        return $this->hasMany(ResGroups::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResGroupsUsersRels()
    {
        return $this->hasMany(ResGroupsUsersRel::className(), ['uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResConfigSettings()
    {
        return $this->hasMany(ResConfigSettings::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResConfigInstallers()
    {
        return $this->hasMany(ResConfigInstaller::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResConfigs()
    {
        return $this->hasMany(ResConfig::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCompanyUsersRels()
    {
        return $this->hasMany(ResCompanyUsersRel::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCurrencies()
    {
        return $this->hasMany(ResCurrency::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResFonts()
    {
        return $this->hasMany(ResFont::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCurrencyRateTypes()
    {
        return $this->hasMany(ResCurrencyRateType::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResLangs()
    {
        return $this->hasMany(ResLang::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCountryStates()
    {
        return $this->hasMany(ResCountryState::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrderLineInvoices()
    {
        return $this->hasMany(PurchaseOrderLineInvoice::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrderGroups()
    {
        return $this->hasMany(PurchaseOrderGroup::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTempRanges()
    {
        return $this->hasMany(TempRange::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockPickings()
    {
        return $this->hasMany(StockPicking::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockLocations()
    {
        return $this->hasMany(StockLocation::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockMoves()
    {
        return $this->hasMany(StockMove::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockInventories()
    {
        return $this->hasMany(StockInventory::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportPaperformats()
    {
        return $this->hasMany(ReportPaperformat::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublisherWarrantyContracts()
    {
        return $this->hasMany(PublisherWarrantyContract::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTaskWorks()
    {
        return $this->hasMany(ProjectTaskWork::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectConfigSettings()
    {
        return $this->hasMany(ProjectConfigSettings::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectAccountAnalyticLines()
    {
        return $this->hasMany(ProjectAccountAnalyticLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductUomCategs()
    {
        return $this->hasMany(ProductUomCateg::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectProjects()
    {
        return $this->hasMany(ProjectProject::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseConfigSettings()
    {
        return $this->hasMany(PurchaseConfigSettings::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTaskHistories()
    {
        return $this->hasMany(ProjectTaskHistory::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTaskTypes()
    {
        return $this->hasMany(ProjectTaskType::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectUserRels()
    {
        return $this->hasMany(ProjectUserRel::className(), ['uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectCategories()
    {
        return $this->hasMany(ProjectCategory::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTasks()
    {
        return $this->hasMany(ProjectTask::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricelistTypes()
    {
        return $this->hasMany(ProductPricelistType::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPublicCategories()
    {
        return $this->hasMany(ProductPublicCategory::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcurementOrderpointComputes()
    {
        return $this->hasMany(ProcurementOrderpointCompute::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcurementOrderComputes()
    {
        return $this->hasMany(ProcurementOrderCompute::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcurementOrderComputeAlls()
    {
        return $this->hasMany(ProcurementOrderComputeAll::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcurementOrders()
    {
        return $this->hasMany(ProcurementOrder::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricelistVersions()
    {
        return $this->hasMany(ProductPricelistVersion::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPriceTypes()
    {
        return $this->hasMany(ProductPriceType::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPackagings()
    {
        return $this->hasMany(ProductPackaging::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricelistItems()
    {
        return $this->hasMany(ProductPricelistItem::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricelists()
    {
        return $this->hasMany(ProductPricelist::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOsvMemoryAutovacuums()
    {
        return $this->hasMany(OsvMemoryAutovacuum::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPricelistPartnerinfos()
    {
        return $this->hasMany(PricelistPartnerinfo::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpRoutingWorkcenters()
    {
        return $this->hasMany(MrpRoutingWorkcenter::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcessTransitions()
    {
        return $this->hasMany(ProcessTransition::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcessProcesses()
    {
        return $this->hasMany(ProcessProcess::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcessTransitionActions()
    {
        return $this->hasMany(ProcessTransitionAction::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcessNodes()
    {
        return $this->hasMany(ProcessNode::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalWizards()
    {
        return $this->hasMany(PortalWizard::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMultiCompanyDefaults()
    {
        return $this->hasMany(MultiCompanyDefault::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpWorkcenterLoads()
    {
        return $this->hasMany(MrpWorkcenterLoad::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpProductPrices()
    {
        return $this->hasMany(MrpProductPrice::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMakeProcurements()
    {
        return $this->hasMany(MakeProcurement::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpRoutings()
    {
        return $this->hasMany(MrpRouting::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpConfigSettings()
    {
        return $this->hasMany(MrpConfigSettings::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpProperties()
    {
        return $this->hasMany(MrpProperty::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpProductionWorkcenterLines()
    {
        return $this->hasMany(MrpProductionWorkcenterLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpPropertyGroups()
    {
        return $this->hasMany(MrpPropertyGroup::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpProductionProductLines()
    {
        return $this->hasMany(MrpProductionProductLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpProductProduces()
    {
        return $this->hasMany(MrpProductProduce::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpProductions()
    {
        return $this->hasMany(MrpProduction::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailMessages()
    {
        return $this->hasMany(MailMessage::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailVotes()
    {
        return $this->hasMany(MailVote::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailMails()
    {
        return $this->hasMany(MailMail::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrUiViewCustoms()
    {
        return $this->hasMany(IrUiViewCustom::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrValues()
    {
        return $this->hasMany(IrValues::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailMessageSubtypes()
    {
        return $this->hasMany(MailMessageSubtype::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailGroups()
    {
        return $this->hasMany(MailGroup::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrSequenceTypes()
    {
        return $this->hasMany(IrSequenceType::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrServerObjectLines()
    {
        return $this->hasMany(IrServerObjectLines::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrMailServers()
    {
        return $this->hasMany(IrMailServer::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModuleModules()
    {
        return $this->hasMany(IrModuleModule::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrRules()
    {
        return $this->hasMany(IrRule::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModuleCategories()
    {
        return $this->hasMany(IrModuleCategory::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrProperties()
    {
        return $this->hasMany(IrProperty::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModelFields()
    {
        return $this->hasMany(IrModelFields::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModuleModuleDependencies()
    {
        return $this->hasMany(IrModuleModuleDependency::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModelAccesses()
    {
        return $this->hasMany(IrModelAccess::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrFieldsConverters()
    {
        return $this->hasMany(IrFieldsConverter::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrActionsTodos()
    {
        return $this->hasMany(IrActionsTodo::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrExports()
    {
        return $this->hasMany(IrExports::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrDefaults()
    {
        return $this->hasMany(IrDefault::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrLoggings()
    {
        return $this->hasMany(IrLogging::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrCrons()
    {
        return $this->hasMany(IrCron::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrExportsLines()
    {
        return $this->hasMany(IrExportsLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrConfigParameters()
    {
        return $this->hasMany(IrConfigParameter::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrAttachments()
    {
        return $this->hasMany(IrAttachment::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrConfigSettings()
    {
        return $this->hasMany(HrConfigSettings::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFetchmailConfigSettings()
    {
        return $this->hasMany(FetchmailConfigSettings::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrEmployees()
    {
        return $this->hasMany(HrEmployee::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailTemplates()
    {
        return $this->hasMany(EmailTemplate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrActions()
    {
        return $this->hasMany(IrActions::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrDepartments()
    {
        return $this->hasMany(HrDepartment::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrEmployeeCategories()
    {
        return $this->hasMany(HrEmployeeCategory::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrJobs()
    {
        return $this->hasMany(HrJob::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFetchmailServers()
    {
        return $this->hasMany(FetchmailServer::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDecimalPrecisions()
    {
        return $this->hasMany(DecimalPrecision::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmPartnerBindings()
    {
        return $this->hasMany(CrmPartnerBinding::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmMakeSales()
    {
        return $this->hasMany(CrmMakeSale::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmLead2opportunityPartners()
    {
        return $this->hasMany(CrmLead2opportunityPartner::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmSegmentations()
    {
        return $this->hasMany(CrmSegmentation::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDecimalPrecisionTests()
    {
        return $this->hasMany(DecimalPrecisionTest::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmMergeOpportunities()
    {
        return $this->hasMany(CrmMergeOpportunity::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmSegmentationLines()
    {
        return $this->hasMany(CrmSegmentationLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmPhonecall2phonecalls()
    {
        return $this->hasMany(CrmPhonecall2phonecall::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmPaymentModes()
    {
        return $this->hasMany(CrmPaymentMode::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmOpportunity2phonecalls()
    {
        return $this->hasMany(CrmOpportunity2phonecall::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmCaseCategs()
    {
        return $this->hasMany(CrmCaseCateg::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarEventTypes()
    {
        return $this->hasMany(CalendarEventType::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChangePasswordWizards()
    {
        return $this->hasMany(ChangePasswordWizard::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmCaseResourceTypes()
    {
        return $this->hasMany(CrmCaseResourceType::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmCaseChannels()
    {
        return $this->hasMany(CrmCaseChannel::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChangeProductionQties()
    {
        return $this->hasMany(ChangeProductionQty::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmCaseStages()
    {
        return $this->hasMany(CrmCaseStage::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashBoxOuts()
    {
        return $this->hasMany(CashBoxOut::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashBoxIns()
    {
        return $this->hasMany(CashBoxIn::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmLeads()
    {
        return $this->hasMany(CrmLead::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarContacts()
    {
        return $this->hasMany(CalendarContacts::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseModuleConfigurations()
    {
        return $this->hasMany(BaseModuleConfiguration::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarAlarms()
    {
        return $this->hasMany(CalendarAlarm::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarAttendees()
    {
        return $this->hasMany(CalendarAttendee::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseUpdateTranslations()
    {
        return $this->hasMany(BaseUpdateTranslations::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseSetupTerminologies()
    {
        return $this->hasMany(BaseSetupTerminology::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoardCreates()
    {
        return $this->hasMany(BoardCreate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasePartnerMergeLines()
    {
        return $this->hasMany(BasePartnerMergeLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseModuleUpgrades()
    {
        return $this->hasMany(BaseModuleUpgrade::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseModuleUpdates()
    {
        return $this->hasMany(BaseModuleUpdate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseModuleImports()
    {
        return $this->hasMany(BaseModuleImport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseLanguageExports()
    {
        return $this->hasMany(BaseLanguageExport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsM2oRequiredRelateds()
    {
        return $this->hasMany(BaseImportTestsModelsM2oRequiredRelated::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsO2ms()
    {
        return $this->hasMany(BaseImportTestsModelsO2m::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsM2oRelateds()
    {
        return $this->hasMany(BaseImportTestsModelsM2oRelated::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsO2mChildren()
    {
        return $this->hasMany(BaseImportTestsModelsO2mChild::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsChars()
    {
        return $this->hasMany(BaseImportTestsModelsChar::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsPreviews()
    {
        return $this->hasMany(BaseImportTestsModelsPreview::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsCharStillreadonlies()
    {
        return $this->hasMany(BaseImportTestsModelsCharStillreadonly::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsCharStates()
    {
        return $this->hasMany(BaseImportTestsModelsCharStates::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsCharRequireds()
    {
        return $this->hasMany(BaseImportTestsModelsCharRequired::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsCharReadonlies()
    {
        return $this->hasMany(BaseImportTestsModelsCharReadonly::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseImportTestsModelsCharNoreadonlies()
    {
        return $this->hasMany(BaseImportTestsModelsCharNoreadonly::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseActionRules()
    {
        return $this->hasMany(BaseActionRule::className(), ['act_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVatDeclarations()
    {
        return $this->hasMany(AccountVatDeclaration::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountUnreconcileReconciles()
    {
        return $this->hasMany(AccountUnreconcileReconcile::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountUnreconciles()
    {
        return $this->hasMany(AccountUnreconcile::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActionTraceabilities()
    {
        return $this->hasMany(ActionTraceability::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseConfigSettings()
    {
        return $this->hasMany(BaseConfigSettings::className(), ['auth_signup_template_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseActionRuleLeadTests()
    {
        return $this->hasMany(BaseActionRuleLeadTest::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountUseModels()
    {
        return $this->hasMany(AccountUseModel::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVouchers()
    {
        return $this->hasMany(AccountVoucher::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountingReports()
    {
        return $this->hasMany(AccountingReport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountSubscriptionGenerates()
    {
        return $this->hasMany(AccountSubscriptionGenerate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountStateOpens()
    {
        return $this->hasMany(AccountStateOpen::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountReportGeneralLedgers()
    {
        return $this->hasMany(AccountReportGeneralLedger::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTaxCharts()
    {
        return $this->hasMany(AccountTaxChart::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountStatementFromInvoiceLines()
    {
        return $this->hasMany(AccountStatementFromInvoiceLines::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPeriodCloses()
    {
        return $this->hasMany(AccountPeriodClose::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPaymentTerms()
    {
        return $this->hasMany(AccountPaymentTerm::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTaxCodes()
    {
        return $this->hasMany(AccountTaxCode::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPrintJournals()
    {
        return $this->hasMany(AccountPrintJournal::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountSubscriptions()
    {
        return $this->hasMany(AccountSubscription::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountSubscriptionLines()
    {
        return $this->hasMany(AccountSubscriptionLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountSequenceFiscalyears()
    {
        return $this->hasMany(AccountSequenceFiscalyear::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPartnerLedgers()
    {
        return $this->hasMany(AccountPartnerLedger::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPartnerBalances()
    {
        return $this->hasMany(AccountPartnerBalance::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountOpenClosedFiscalyears()
    {
        return $this->hasMany(AccountOpenClosedFiscalyear::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLineUnreconcileSelects()
    {
        return $this->hasMany(AccountMoveLineUnreconcileSelect::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLineReconciles()
    {
        return $this->hasMany(AccountMoveLineReconcile::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveReconciles()
    {
        return $this->hasMany(AccountMoveReconcile::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournalSelects()
    {
        return $this->hasMany(AccountJournalSelect::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLineReconcileWriteoffs()
    {
        return $this->hasMany(AccountMoveLineReconcileWriteoff::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveBankReconciles()
    {
        return $this->hasMany(AccountMoveBankReconcile::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPartnerReconcileProcesses()
    {
        return $this->hasMany(AccountPartnerReconcileProcess::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLineReconcileSelects()
    {
        return $this->hasMany(AccountMoveLineReconcileSelect::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountModels()
    {
        return $this->hasMany(AccountModel::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceCancels()
    {
        return $this->hasMany(AccountInvoiceCancel::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceConfirms()
    {
        return $this->hasMany(AccountInvoiceConfirm::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInstallers()
    {
        return $this->hasMany(AccountInstaller::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductUoms()
    {
        return $this->hasMany(ProductUom::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceTaxes()
    {
        return $this->hasMany(AccountInvoiceTax::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductProducts()
    {
        return $this->hasMany(ProductProduct::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCurrencyRates()
    {
        return $this->hasMany(ResCurrencyRate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartners()
    {
        return $this->hasMany(ResPartner::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTemplates()
    {
        return $this->hasMany(ProductTemplate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceRefunds()
    {
        return $this->hasMany(AccountInvoiceRefund::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountJournalCashboxLines()
    {
        return $this->hasMany(AccountJournalCashboxLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalPositions()
    {
        return $this->hasMany(AccountFiscalPosition::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountGeneralJournals()
    {
        return $this->hasMany(AccountGeneralJournal::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLines()
    {
        return $this->hasMany(AccountMoveLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountConfigSettings()
    {
        return $this->hasMany(AccountConfigSettings::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoves()
    {
        return $this->hasMany(AccountMove::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPeriods()
    {
        return $this->hasMany(AccountPeriod::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalyears()
    {
        return $this->hasMany(AccountFiscalyear::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalPositionTemplates()
    {
        return $this->hasMany(AccountFiscalPositionTemplate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalPositionTaxes()
    {
        return $this->hasMany(AccountFiscalPositionTax::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalyearCloses()
    {
        return $this->hasMany(AccountFiscalyearClose::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalPositionTaxTemplates()
    {
        return $this->hasMany(AccountFiscalPositionTaxTemplate::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountFiscalyearCloseStates()
    {
        return $this->hasMany(AccountFiscalyearCloseState::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBankStatements()
    {
        return $this->hasMany(AccountBankStatement::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonReports()
    {
        return $this->hasMany(AccountCommonReport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonPartnerReports()
    {
        return $this->hasMany(AccountCommonPartnerReport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonJournalReports()
    {
        return $this->hasMany(AccountCommonJournalReport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCharts()
    {
        return $this->hasMany(AccountChart::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCentralJournals()
    {
        return $this->hasMany(AccountCentralJournal::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCommonAccountReports()
    {
        return $this->hasMany(AccountCommonAccountReport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountChangeCurrencies()
    {
        return $this->hasMany(AccountChangeCurrency::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountCashboxLines()
    {
        return $this->hasMany(AccountCashboxLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBankAccountsWizards()
    {
        return $this->hasMany(AccountBankAccountsWizard::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBalanceReports()
    {
        return $this->hasMany(AccountBalanceReport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticLines()
    {
        return $this->hasMany(AccountAnalyticLine::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticInvertedBalances()
    {
        return $this->hasMany(AccountAnalyticInvertedBalance::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticJournals()
    {
        return $this->hasMany(AccountAnalyticJournal::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticCostLedgers()
    {
        return $this->hasMany(AccountAnalyticCostLedger::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticCharts()
    {
        return $this->hasMany(AccountAnalyticChart::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAgedTrialBalances()
    {
        return $this->hasMany(AccountAgedTrialBalance::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAddtmplWizards()
    {
        return $this->hasMany(AccountAddtmplWizard::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticCostLedgerJournalReports()
    {
        return $this->hasMany(AccountAnalyticCostLedgerJournalReport::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAutomaticReconciles()
    {
        return $this->hasMany(AccountAutomaticReconcile::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticBalances()
    {
        return $this->hasMany(AccountAnalyticBalance::className(), ['create_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticJournalReports()
    {
        return $this->hasMany(AccountAnalyticJournalReport::className(), ['create_uid' => 'id']);
    }
}
