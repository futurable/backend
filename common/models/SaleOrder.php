<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sale_order".
 *
 * @property integer $id
 * @property integer $create_uid
 * @property string $create_date
 * @property string $write_date
 * @property integer $write_uid
 * @property string $origin
 * @property string $order_policy
 * @property string $invoice_quantity
 * @property string $client_order_ref
 * @property string $date_order
 * @property integer $partner_id
 * @property string $note
 * @property integer $fiscal_position
 * @property string $amount_untaxed
 * @property integer $payment_term
 * @property string $message_last_post
 * @property integer $company_id
 * @property string $amount_tax
 * @property string $state
 * @property integer $pricelist_id
 * @property integer $partner_invoice_id
 * @property integer $user_id
 * @property string $date_confirm
 * @property string $amount_total
 * @property integer $project_id
 * @property string $name
 * @property integer $partner_shipping_id
 * @property integer $section_id
 * @property string $picking_policy
 * @property integer $incoterm
 * @property integer $warehouse_id
 * @property boolean $shipped
 *
 * @property SaleOrderInvoiceRel[] $saleOrderInvoiceRels
 * @property SaleOrderLine[] $saleOrderLines
 * @property SaleOrderCategoryRel[] $saleOrderCategoryRels
 * @property ResUsers $writeU
 * @property StockWarehouse $warehouse
 * @property ResUsers $user
 * @property CrmCaseSection $section
 * @property AccountAnalyticAccount $project
 * @property ProductPricelist $pricelist
 * @property AccountPaymentTerm $paymentTerm
 * @property ResPartner $partnerShipping
 * @property ResPartner $partnerInvoice
 * @property ResPartner $partner
 * @property StockIncoterms $incoterm0
 * @property AccountFiscalPosition $fiscalPosition
 * @property ResUsers $createU
 * @property ResCompany $company
 * @property StockPicking[] $stockPickings
 */
class SaleOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sale_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_uid', 'write_uid', 'partner_id', 'fiscal_position', 'payment_term', 'company_id', 'pricelist_id', 'partner_invoice_id', 'user_id', 'project_id', 'partner_shipping_id', 'section_id', 'incoterm', 'warehouse_id'], 'integer'],
            [['create_date', 'write_date', 'order_policy', 'invoice_quantity', 'note', 'amount_untaxed', 'message_last_post', 'amount_tax', 'state', 'amount_total', 'picking_policy'], 'string'],
            [['order_policy', 'invoice_quantity', 'date_order', 'partner_id', 'pricelist_id', 'partner_invoice_id', 'name', 'partner_shipping_id', 'picking_policy', 'warehouse_id'], 'required'],
            [['date_order', 'date_confirm'], 'safe'],
            [['shipped'], 'boolean'],
            [['origin', 'client_order_ref', 'name'], 'string', 'max' => 64],
            [['name', 'company_id'], 'unique', 'targetAttribute' => ['name', 'company_id'], 'message' => 'The combination of Company and Order Reference has already been taken.']
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
            'origin' => Yii::t('Backend', 'Source Document'),
            'order_policy' => Yii::t('Backend', 'Create Invoice'),
            'invoice_quantity' => Yii::t('Backend', 'Invoice on'),
            'client_order_ref' => Yii::t('Backend', 'Customer Reference'),
            'date_order' => Yii::t('Backend', 'Date'),
            'partner_id' => Yii::t('Backend', 'Customer'),
            'note' => Yii::t('Backend', 'Terms and conditions'),
            'fiscal_position' => Yii::t('Backend', 'Fiscal Position'),
            'amount_untaxed' => Yii::t('Backend', 'Untaxed Amount'),
            'payment_term' => Yii::t('Backend', 'Payment Term'),
            'message_last_post' => Yii::t('Backend', 'Last Message Date'),
            'company_id' => Yii::t('Backend', 'Company'),
            'amount_tax' => Yii::t('Backend', 'Taxes'),
            'state' => Yii::t('Backend', 'Status'),
            'pricelist_id' => Yii::t('Backend', 'Pricelist'),
            'partner_invoice_id' => Yii::t('Backend', 'Invoice Address'),
            'user_id' => Yii::t('Backend', 'Salesperson'),
            'date_confirm' => Yii::t('Backend', 'Confirmation Date'),
            'amount_total' => Yii::t('Backend', 'Total'),
            'project_id' => Yii::t('Backend', 'Contract / Analytic'),
            'name' => Yii::t('Backend', 'Order Reference'),
            'partner_shipping_id' => Yii::t('Backend', 'Delivery Address'),
            'section_id' => Yii::t('Backend', 'Sales Team'),
            'picking_policy' => Yii::t('Backend', 'Shipping Policy'),
            'incoterm' => Yii::t('Backend', 'Incoterm'),
            'warehouse_id' => Yii::t('Backend', 'Warehouse'),
            'shipped' => Yii::t('Backend', 'Delivered'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrderInvoiceRels()
    {
        return $this->hasMany(SaleOrderInvoiceRel::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrderLines()
    {
        return $this->hasMany(SaleOrderLine::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrderCategoryRels()
    {
        return $this->hasMany(SaleOrderCategoryRel::className(), ['order_id' => 'id']);
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
    public function getWarehouse()
    {
        return $this->hasOne(StockWarehouse::className(), ['id' => 'warehouse_id']);
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
    public function getSection()
    {
        return $this->hasOne(CrmCaseSection::className(), ['id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(AccountAnalyticAccount::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPricelist()
    {
        return $this->hasOne(ProductPricelist::className(), ['id' => 'pricelist_id']);
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
    public function getPartnerShipping()
    {
        return $this->hasOne(ResPartner::className(), ['id' => 'partner_shipping_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartnerInvoice()
    {
        return $this->hasOne(ResPartner::className(), ['id' => 'partner_invoice_id']);
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
    public function getIncoterm0()
    {
        return $this->hasOne(StockIncoterms::className(), ['id' => 'incoterm']);
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
    public function getStockPickings()
    {
        return $this->hasMany(StockPicking::className(), ['sale_id' => 'id']);
    }
}
