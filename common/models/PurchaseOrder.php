<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purchase_order".
 *
 * @property integer $id
 * @property integer $create_uid
 * @property string $create_date
 * @property string $write_date
 * @property integer $write_uid
 * @property string $origin
 * @property integer $journal_id
 * @property integer $currency_id
 * @property string $date_order
 * @property integer $partner_id
 * @property integer $dest_address_id
 * @property integer $fiscal_position
 * @property string $amount_untaxed
 * @property integer $location_id
 * @property string $message_last_post
 * @property integer $company_id
 * @property string $amount_tax
 * @property string $state
 * @property integer $pricelist_id
 * @property integer $warehouse_id
 * @property integer $payment_term_id
 * @property string $partner_ref
 * @property string $date_approve
 * @property string $amount_total
 * @property string $name
 * @property string $notes
 * @property string $invoice_method
 * @property boolean $shipped
 * @property integer $validator
 * @property string $minimum_planned_date
 *
 * @property ResUsers $writeU
 * @property StockWarehouse $warehouse
 * @property ResUsers $validator0
 * @property ProductPricelist $pricelist
 * @property AccountPaymentTerm $paymentTerm
 * @property ResPartner $partner
 * @property StockLocation $location
 * @property AccountJournal $journal
 * @property AccountFiscalPosition $fiscalPosition
 * @property ResPartner $destAddress
 * @property ResCurrency $currency
 * @property ResUsers $createU
 * @property ResCompany $company
 * @property PurchaseOrderLine[] $purchaseOrderLines
 * @property StockPicking[] $stockPickings
 * @property PurchaseInvoiceRel[] $purchaseInvoiceRels
 * @property ProcurementOrder[] $procurementOrders
 */
class PurchaseOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_uid', 'write_uid', 'journal_id', 'currency_id', 'partner_id', 'dest_address_id', 'fiscal_position', 'location_id', 'company_id', 'pricelist_id', 'warehouse_id', 'payment_term_id', 'validator'], 'integer'],
            [['create_date', 'write_date', 'amount_untaxed', 'message_last_post', 'amount_tax', 'state', 'amount_total', 'notes', 'invoice_method'], 'string'],
            [['currency_id', 'date_order', 'partner_id', 'location_id', 'company_id', 'pricelist_id', 'name', 'invoice_method'], 'required'],
            [['date_order', 'date_approve', 'minimum_planned_date'], 'safe'],
            [['shipped'], 'boolean'],
            [['origin', 'partner_ref', 'name'], 'string', 'max' => 64],
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
            'journal_id' => Yii::t('Backend', 'Journal'),
            'currency_id' => Yii::t('Backend', 'Currency'),
            'date_order' => Yii::t('Backend', 'Order Date'),
            'partner_id' => Yii::t('Backend', 'Supplier'),
            'dest_address_id' => Yii::t('Backend', 'Customer Address (Direct Delivery)'),
            'fiscal_position' => Yii::t('Backend', 'Fiscal Position'),
            'amount_untaxed' => Yii::t('Backend', 'Untaxed Amount'),
            'location_id' => Yii::t('Backend', 'Destination'),
            'message_last_post' => Yii::t('Backend', 'Last Message Date'),
            'company_id' => Yii::t('Backend', 'Company'),
            'amount_tax' => Yii::t('Backend', 'Taxes'),
            'state' => Yii::t('Backend', 'Status'),
            'pricelist_id' => Yii::t('Backend', 'Pricelist'),
            'warehouse_id' => Yii::t('Backend', 'Destination Warehouse'),
            'payment_term_id' => Yii::t('Backend', 'Payment Term'),
            'partner_ref' => Yii::t('Backend', 'Supplier Reference'),
            'date_approve' => Yii::t('Backend', 'Date Approved'),
            'amount_total' => Yii::t('Backend', 'Total'),
            'name' => Yii::t('Backend', 'Order Reference'),
            'notes' => Yii::t('Backend', 'Terms and Conditions'),
            'invoice_method' => Yii::t('Backend', 'Invoicing Control'),
            'shipped' => Yii::t('Backend', 'Received'),
            'validator' => Yii::t('Backend', 'Validated by'),
            'minimum_planned_date' => Yii::t('Backend', 'Expected Date'),
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
    public function getWarehouse()
    {
        return $this->hasOne(StockWarehouse::className(), ['id' => 'warehouse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValidator0()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'validator']);
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
        return $this->hasOne(AccountPaymentTerm::className(), ['id' => 'payment_term_id']);
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
    public function getLocation()
    {
        return $this->hasOne(StockLocation::className(), ['id' => 'location_id']);
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
    public function getFiscalPosition()
    {
        return $this->hasOne(AccountFiscalPosition::className(), ['id' => 'fiscal_position']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDestAddress()
    {
        return $this->hasOne(ResPartner::className(), ['id' => 'dest_address_id']);
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
    public function getPurchaseOrderLines()
    {
        return $this->hasMany(PurchaseOrderLine::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockPickings()
    {
        return $this->hasMany(StockPicking::className(), ['purchase_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseInvoiceRels()
    {
        return $this->hasMany(PurchaseInvoiceRel::className(), ['purchase_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcurementOrders()
    {
        return $this->hasMany(ProcurementOrder::className(), ['purchase_id' => 'id']);
    }
}
