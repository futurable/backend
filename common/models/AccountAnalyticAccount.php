<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "account_analytic_account".
 *
 * @property integer $id
 * @property integer $create_uid
 * @property string $create_date
 * @property string $write_date
 * @property integer $write_uid
 * @property string $code
 * @property string $description
 * @property double $quantity_max
 * @property integer $currency_id
 * @property string $date
 * @property integer $partner_id
 * @property integer $user_id
 * @property string $name
 * @property integer $parent_id
 * @property string $date_start
 * @property string $message_last_post
 * @property integer $company_id
 * @property string $state
 * @property integer $manager_id
 * @property string $type
 * @property integer $template_id
 * @property boolean $use_tasks
 *
 * @property MrpWorkcenter[] $mrpWorkcenters
 * @property ResUsers $writeU
 * @property ResUsers $user
 * @property AccountAnalyticAccount $template
 * @property AccountAnalyticAccount[] $accountAnalyticAccounts
 * @property ResPartner $partner
 * @property AccountAnalyticAccount $parent
 * @property ResUsers $manager
 * @property ResCurrency $currency
 * @property ResUsers $createU
 * @property ResCompany $company
 * @property AccountVoucherLine[] $accountVoucherLines
 * @property PurchaseOrderLine[] $purchaseOrderLines
 * @property AccountInvoiceLine[] $accountInvoiceLines
 * @property AccountTax[] $accountTaxes
 * @property AccountBankStatementLine[] $accountBankStatementLines
 * @property AccountModelLine[] $accountModelLines
 * @property SaleOrder[] $saleOrders
 * @property ProjectProject[] $projectProjects
 * @property AccountVoucher[] $accountVouchers
 * @property AccountMoveLineReconcileWriteoff[] $accountMoveLineReconcileWriteoffs
 * @property AccountInvoiceTax[] $accountInvoiceTaxes
 * @property AccountMoveLine[] $accountMoveLines
 * @property AccountAnalyticLine[] $accountAnalyticLines
 */
class AccountAnalyticAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account_analytic_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_uid', 'write_uid', 'currency_id', 'partner_id', 'user_id', 'parent_id', 'company_id', 'manager_id', 'template_id'], 'integer'],
            [['create_date', 'write_date', 'date', 'date_start', 'message_last_post'], 'safe'],
            [['code', 'description', 'state', 'type'], 'string'],
            [['quantity_max'], 'number'],
            [['name', 'state', 'type'], 'required'],
            [['use_tasks'], 'boolean'],
            [['name'], 'string', 'max' => 128]
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
            'code' => Yii::t('Backend', 'Reference'),
            'description' => Yii::t('Backend', 'Description'),
            'quantity_max' => Yii::t('Backend', 'Prepaid Service Units'),
            'currency_id' => Yii::t('Backend', 'Currency'),
            'date' => Yii::t('Backend', 'Expiration Date'),
            'partner_id' => Yii::t('Backend', 'Customer'),
            'user_id' => Yii::t('Backend', 'Project Manager'),
            'name' => Yii::t('Backend', 'Account/Contract Name'),
            'parent_id' => Yii::t('Backend', 'Parent Analytic Account'),
            'date_start' => Yii::t('Backend', 'Start Date'),
            'message_last_post' => Yii::t('Backend', 'Last Message Date'),
            'company_id' => Yii::t('Backend', 'Company'),
            'state' => Yii::t('Backend', 'Status'),
            'manager_id' => Yii::t('Backend', 'Account Manager'),
            'type' => Yii::t('Backend', 'Type of Account'),
            'template_id' => Yii::t('Backend', 'Template of Contract'),
            'use_tasks' => Yii::t('Backend', 'Tasks'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpWorkcenters()
    {
        return $this->hasMany(MrpWorkcenter::className(), ['costs_cycle_account_id' => 'id']);
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
    public function getTemplate()
    {
        return $this->hasOne(AccountAnalyticAccount::className(), ['id' => 'template_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticAccounts()
    {
        return $this->hasMany(AccountAnalyticAccount::className(), ['parent_id' => 'id']);
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
        return $this->hasOne(AccountAnalyticAccount::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'manager_id']);
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
    public function getAccountVoucherLines()
    {
        return $this->hasMany(AccountVoucherLine::className(), ['account_analytic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrderLines()
    {
        return $this->hasMany(PurchaseOrderLine::className(), ['account_analytic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceLines()
    {
        return $this->hasMany(AccountInvoiceLine::className(), ['account_analytic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountTaxes()
    {
        return $this->hasMany(AccountTax::className(), ['account_analytic_collected_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountBankStatementLines()
    {
        return $this->hasMany(AccountBankStatementLine::className(), ['analytic_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountModelLines()
    {
        return $this->hasMany(AccountModelLine::className(), ['analytic_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrders()
    {
        return $this->hasMany(SaleOrder::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectProjects()
    {
        return $this->hasMany(ProjectProject::className(), ['analytic_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountVouchers()
    {
        return $this->hasMany(AccountVoucher::className(), ['analytic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLineReconcileWriteoffs()
    {
        return $this->hasMany(AccountMoveLineReconcileWriteoff::className(), ['analytic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceTaxes()
    {
        return $this->hasMany(AccountInvoiceTax::className(), ['account_analytic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLines()
    {
        return $this->hasMany(AccountMoveLine::className(), ['analytic_account_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticLines()
    {
        return $this->hasMany(AccountAnalyticLine::className(), ['account_id' => 'id']);
    }
}
