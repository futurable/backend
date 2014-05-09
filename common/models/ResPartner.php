<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "res_partner".
 *
 * @property integer $id
 * @property string $name
 * @property string $lang
 * @property integer $company_id
 * @property integer $create_uid
 * @property string $create_date
 * @property string $write_date
 * @property integer $write_uid
 * @property string $comment
 * @property string $ean13
 * @property integer $color
 * @property resource $image
 * @property boolean $use_parent_address
 * @property boolean $active
 * @property string $street
 * @property boolean $supplier
 * @property string $city
 * @property integer $user_id
 * @property string $zip
 * @property integer $title
 * @property string $function
 * @property integer $country_id
 * @property integer $parent_id
 * @property boolean $employee
 * @property string $type
 * @property string $email
 * @property string $vat
 * @property string $website
 * @property string $fax
 * @property string $street2
 * @property string $phone
 * @property string $credit_limit
 * @property string $date
 * @property string $tz
 * @property string $display_name
 * @property boolean $customer
 * @property resource $image_medium
 * @property string $mobile
 * @property string $ref
 * @property resource $image_small
 * @property string $birthdate
 * @property boolean $is_company
 * @property integer $state_id
 * @property integer $commercial_partner_id
 * @property string $message_last_post
 * @property string $notification_email_send
 * @property boolean $opt_out
 * @property string $signup_type
 * @property string $signup_expiration
 * @property string $signup_token
 * @property string $last_reconciliation_date
 * @property string $debit_limit
 * @property boolean $vat_subjected
 * @property string $calendar_last_notif_ack
 * @property integer $section_id
 *
 * @property PurchaseOrder[] $purchaseOrders
 * @property ProductSupplierinfo[] $productSupplierinfos
 * @property PortalWizardUser[] $portalWizardUsers
 * @property CrmLead2opportunityPartnerMass[] $crmLead2opportunityPartnerMasses
 * @property MailComposeMessage[] $mailComposeMessages
 * @property AccountAnalyticAccount[] $accountAnalyticAccounts
 * @property CrmPhonecall[] $crmPhonecalls
 * @property AccountInvoice[] $accountInvoices
 * @property BasePartnerMergeAutomaticWizardResPartnerRel[] $basePartnerMergeAutomaticWizardResPartnerRels
 * @property BasePartnerMergeAutomaticWizard[] $basePartnerMergeAutomaticWizards
 * @property PurchaseOrderLine[] $purchaseOrderLines
 * @property AccountInvoiceLine[] $accountInvoiceLines
 * @property ResPartnerBank[] $resPartnerBanks
 * @property AccountBankStatementLine[] $accountBankStatementLines
 * @property AccountModelLine[] $accountModelLines
 * @property ResCompany[] $resCompanies
 * @property ResUsers[] $resUsers
 * @property StockWarehouse[] $stockWarehouses
 * @property SaleOrderLine[] $saleOrderLines
 * @property ResPartnerResPartnerCategoryRel[] $resPartnerResPartnerCategoryRels
 * @property SaleOrder[] $saleOrders
 * @property StockPicking[] $stockPickings
 * @property StockLocation[] $stockLocations
 * @property StockMove[] $stockMoves
 * @property ProjectTask[] $projectTasks
 * @property MailWizardInviteResPartnerRel[] $mailWizardInviteResPartnerRels
 * @property MailMessage[] $mailMessages
 * @property MailFollowers[] $mailFollowers
 * @property MailMailResPartnerRel[] $mailMailResPartnerRels
 * @property MailNotification[] $mailNotifications
 * @property MailComposeMessageResPartnerRel[] $mailComposeMessageResPartnerRels
 * @property MailMessageResPartnerRel[] $mailMessageResPartnerRels
 * @property HrEmployee[] $hrEmployees
 * @property CrmPartnerBinding[] $crmPartnerBindings
 * @property CrmMakeSale[] $crmMakeSales
 * @property CrmLead2opportunityPartner[] $crmLead2opportunityPartners
 * @property CrmPhonecall2phonecall[] $crmPhonecall2phonecalls
 * @property CrmOpportunity2phonecall[] $crmOpportunity2phonecalls
 * @property CalendarEventResPartnerRel[] $calendarEventResPartnerRels
 * @property CalendarEventPartnerRel[] $calendarEventPartnerRels
 * @property CrmLead[] $crmLeads
 * @property CalendarContacts[] $calendarContacts
 * @property CalendarAttendee[] $calendarAttendees
 * @property BaseActionRuleResPartnerRel[] $baseActionRuleResPartnerRels
 * @property BaseActionRuleLeadTest[] $baseActionRuleLeadTests
 * @property AccountVoucher[] $accountVouchers
 * @property AccountPartnerReconcileProcess[] $accountPartnerReconcileProcesses
 * @property ResUsers $writeU
 * @property ResUsers $user
 * @property ResPartnerTitle $title0
 * @property ResCountryState $state
 * @property CrmCaseSection $section
 * @property ResPartner $parent
 * @property ResPartner[] $resPartners
 * @property ResUsers $createU
 * @property ResCountry $country
 * @property ResCompany $company
 * @property ResPartner $commercialPartner
 * @property AccountMoveLine[] $accountMoveLines
 * @property AccountMove[] $accountMoves
 */
class ResPartner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'res_partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'notification_email_send'], 'required'],
            [['company_id', 'create_uid', 'write_uid', 'color', 'user_id', 'title', 'country_id', 'parent_id', 'state_id', 'commercial_partner_id', 'section_id'], 'integer'],
            [['create_date', 'write_date', 'comment', 'image', 'type', 'credit_limit', 'display_name', 'image_medium', 'image_small', 'message_last_post', 'notification_email_send', 'signup_type', 'signup_expiration', 'signup_token', 'last_reconciliation_date', 'debit_limit', 'calendar_last_notif_ack'], 'string'],
            [['use_parent_address', 'active', 'supplier', 'employee', 'customer', 'is_company', 'opt_out', 'vat_subjected'], 'boolean'],
            [['date'], 'safe'],
            [['name', 'street', 'city', 'function', 'street2'], 'string', 'max' => 128],
            [['lang', 'website', 'fax', 'phone', 'tz', 'mobile', 'ref', 'birthdate'], 'string', 'max' => 64],
            [['ean13'], 'string', 'max' => 13],
            [['zip'], 'string', 'max' => 24],
            [['email'], 'string', 'max' => 240],
            [['vat'], 'string', 'max' => 32]
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
            'lang' => Yii::t('Backend', 'Lang'),
            'company_id' => Yii::t('Backend', 'Company ID'),
            'create_uid' => Yii::t('Backend', 'Create Uid'),
            'create_date' => Yii::t('Backend', 'Create Date'),
            'write_date' => Yii::t('Backend', 'Write Date'),
            'write_uid' => Yii::t('Backend', 'Write Uid'),
            'comment' => Yii::t('Backend', 'Notes'),
            'ean13' => Yii::t('Backend', 'EAN13'),
            'color' => Yii::t('Backend', 'Color Index'),
            'image' => Yii::t('Backend', 'Image'),
            'use_parent_address' => Yii::t('Backend', 'Use Company Address'),
            'active' => Yii::t('Backend', 'Active'),
            'street' => Yii::t('Backend', 'Street'),
            'supplier' => Yii::t('Backend', 'Supplier'),
            'city' => Yii::t('Backend', 'City'),
            'user_id' => Yii::t('Backend', 'Salesperson'),
            'zip' => Yii::t('Backend', 'Zip'),
            'title' => Yii::t('Backend', 'Title'),
            'function' => Yii::t('Backend', 'Job Position'),
            'country_id' => Yii::t('Backend', 'Country'),
            'parent_id' => Yii::t('Backend', 'Related Company'),
            'employee' => Yii::t('Backend', 'Employee'),
            'type' => Yii::t('Backend', 'Address Type'),
            'email' => Yii::t('Backend', 'Email'),
            'vat' => Yii::t('Backend', 'TIN'),
            'website' => Yii::t('Backend', 'Website'),
            'fax' => Yii::t('Backend', 'Fax'),
            'street2' => Yii::t('Backend', 'Street2'),
            'phone' => Yii::t('Backend', 'Phone'),
            'credit_limit' => Yii::t('Backend', 'Credit Limit'),
            'date' => Yii::t('Backend', 'Date'),
            'tz' => Yii::t('Backend', 'Timezone'),
            'display_name' => Yii::t('Backend', 'Name'),
            'customer' => Yii::t('Backend', 'Customer'),
            'image_medium' => Yii::t('Backend', 'Medium-sized image'),
            'mobile' => Yii::t('Backend', 'Mobile'),
            'ref' => Yii::t('Backend', 'Reference'),
            'image_small' => Yii::t('Backend', 'Small-sized image'),
            'birthdate' => Yii::t('Backend', 'Birthdate'),
            'is_company' => Yii::t('Backend', 'Is a Company'),
            'state_id' => Yii::t('Backend', 'State'),
            'commercial_partner_id' => Yii::t('Backend', 'Commercial Entity'),
            'message_last_post' => Yii::t('Backend', 'Last Message Date'),
            'notification_email_send' => Yii::t('Backend', 'Receive Messages by Email'),
            'opt_out' => Yii::t('Backend', 'Opt-Out'),
            'signup_type' => Yii::t('Backend', 'Signup Token Type'),
            'signup_expiration' => Yii::t('Backend', 'Signup Expiration'),
            'signup_token' => Yii::t('Backend', 'Signup Token'),
            'last_reconciliation_date' => Yii::t('Backend', 'Latest Full Reconciliation Date'),
            'debit_limit' => Yii::t('Backend', 'Payable Limit'),
            'vat_subjected' => Yii::t('Backend', 'VAT Legal Statement'),
            'calendar_last_notif_ack' => Yii::t('Backend', 'Last notification marked as read from base Calendar'),
            'section_id' => Yii::t('Backend', 'Sales Team'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSupplierinfos()
    {
        return $this->hasMany(ProductSupplierinfo::className(), ['name' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortalWizardUsers()
    {
        return $this->hasMany(PortalWizardUser::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmLead2opportunityPartnerMasses()
    {
        return $this->hasMany(CrmLead2opportunityPartnerMass::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailComposeMessages()
    {
        return $this->hasMany(MailComposeMessage::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticAccounts()
    {
        return $this->hasMany(AccountAnalyticAccount::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmPhonecalls()
    {
        return $this->hasMany(CrmPhonecall::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoices()
    {
        return $this->hasMany(AccountInvoice::className(), ['commercial_partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasePartnerMergeAutomaticWizardResPartnerRels()
    {
        return $this->hasMany(BasePartnerMergeAutomaticWizardResPartnerRel::className(), ['res_partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBasePartnerMergeAutomaticWizards()
    {
        return $this->hasMany(BasePartnerMergeAutomaticWizard::className(), ['dst_partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrderLines()
    {
        return $this->hasMany(PurchaseOrderLine::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceLines()
    {
        return $this->hasMany(AccountInvoiceLine::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartnerBanks()
    {
        return $this->hasMany(ResPartnerBank::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBankStatementLines()
    {
        return $this->hasMany(AccountBankStatementLine::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountModelLines()
    {
        return $this->hasMany(AccountModelLine::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResCompanies()
    {
        return $this->hasMany(ResCompany::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResUsers()
    {
        return $this->hasMany(ResUsers::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockWarehouses()
    {
        return $this->hasMany(StockWarehouse::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrderLines()
    {
        return $this->hasMany(SaleOrderLine::className(), ['address_allotment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartnerResPartnerCategoryRels()
    {
        return $this->hasMany(ResPartnerResPartnerCategoryRel::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrders()
    {
        return $this->hasMany(SaleOrder::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockPickings()
    {
        return $this->hasMany(StockPicking::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockLocations()
    {
        return $this->hasMany(StockLocation::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockMoves()
    {
        return $this->hasMany(StockMove::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTasks()
    {
        return $this->hasMany(ProjectTask::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailWizardInviteResPartnerRels()
    {
        return $this->hasMany(MailWizardInviteResPartnerRel::className(), ['res_partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailMessages()
    {
        return $this->hasMany(MailMessage::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailFollowers()
    {
        return $this->hasMany(MailFollowers::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailMailResPartnerRels()
    {
        return $this->hasMany(MailMailResPartnerRel::className(), ['res_partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailNotifications()
    {
        return $this->hasMany(MailNotification::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailComposeMessageResPartnerRels()
    {
        return $this->hasMany(MailComposeMessageResPartnerRel::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailMessageResPartnerRels()
    {
        return $this->hasMany(MailMessageResPartnerRel::className(), ['res_partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrEmployees()
    {
        return $this->hasMany(HrEmployee::className(), ['address_home_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmPartnerBindings()
    {
        return $this->hasMany(CrmPartnerBinding::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmMakeSales()
    {
        return $this->hasMany(CrmMakeSale::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmLead2opportunityPartners()
    {
        return $this->hasMany(CrmLead2opportunityPartner::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmPhonecall2phonecalls()
    {
        return $this->hasMany(CrmPhonecall2phonecall::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmOpportunity2phonecalls()
    {
        return $this->hasMany(CrmOpportunity2phonecall::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarEventResPartnerRels()
    {
        return $this->hasMany(CalendarEventResPartnerRel::className(), ['res_partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarEventPartnerRels()
    {
        return $this->hasMany(CalendarEventPartnerRel::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmLeads()
    {
        return $this->hasMany(CrmLead::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarContacts()
    {
        return $this->hasMany(CalendarContacts::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarAttendees()
    {
        return $this->hasMany(CalendarAttendee::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseActionRuleResPartnerRels()
    {
        return $this->hasMany(BaseActionRuleResPartnerRel::className(), ['res_partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseActionRuleLeadTests()
    {
        return $this->hasMany(BaseActionRuleLeadTest::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVouchers()
    {
        return $this->hasMany(AccountVoucher::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountPartnerReconcileProcesses()
    {
        return $this->hasMany(AccountPartnerReconcileProcess::className(), ['next_partner_id' => 'id']);
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
    public function getTitle0()
    {
        return $this->hasOne(ResPartnerTitle::className(), ['id' => 'title']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(ResCountryState::className(), ['id' => 'state_id']);
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
    public function getParent()
    {
        return $this->hasOne(ResPartner::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResPartners()
    {
        return $this->hasMany(ResPartner::className(), ['commercial_partner_id' => 'id']);
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
    public function getCountry()
    {
        return $this->hasOne(ResCountry::className(), ['id' => 'country_id']);
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
    public function getCommercialPartner()
    {
        return $this->hasOne(ResPartner::className(), ['id' => 'commercial_partner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLines()
    {
        return $this->hasMany(AccountMoveLine::className(), ['partner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoves()
    {
        return $this->hasMany(AccountMove::className(), ['partner_id' => 'id']);
    }
}
