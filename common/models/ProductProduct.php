<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_product".
 *
 * @property integer $id
 * @property integer $create_uid
 * @property string $create_date
 * @property string $ean13
 * @property integer $write_uid
 * @property string $message_last_post
 * @property string $default_code
 * @property string $write_date
 * @property string $name_template
 * @property boolean $active
 * @property integer $product_tmpl_id
 * @property resource $image_variant
 *
 * @property AccountInvoiceLine[] $accountInvoiceLines
 * @property HrTimesheetInvoiceCreateFinal[] $hrTimesheetInvoiceCreateFinals
 * @property HrTimesheetInvoiceCreate[] $hrTimesheetInvoiceCreates
 * @property StockQuant[] $stockQuants
 * @property StockInventory[] $stockInventories
 * @property StockInventoryLine[] $stockInventoryLines
 * @property StockPackOperation[] $stockPackOperations
 * @property PurchaseOrderLine[] $purchaseOrderLines
 * @property StockTransferDetailsItems[] $stockTransferDetailsItems
 * @property MrpBom[] $mrpBoms
 * @property MrpProduction[] $mrpProductions
 * @property AccountAnalyticLine[] $accountAnalyticLines
 * @property ProductAttributeValueProductProductRel[] $productAttributeValueProductProductRels
 * @property ProductPricelistItem[] $productPricelistItems
 * @property ResUsers $createU
 * @property ResUsers $writeU
 * @property ProductTemplate $productTmpl
 * @property AccountAnalyticInvoiceLine[] $accountAnalyticInvoiceLines
 * @property SaleOrderLine[] $saleOrderLines
 * @property StockMoveConsume[] $stockMoveConsumes
 * @property ProcurementOrder[] $procurementOrders
 * @property HrEmployee[] $hrEmployees
 * @property MrpWorkcenter[] $mrpWorkcenters
 * @property MrpProductionProductLine[] $mrpProductionProductLines
 * @property MrpBomLine[] $mrpBomLines
 * @property SaleAdvancePaymentInv[] $saleAdvancePaymentInvs
 * @property MrpProductProduceLine[] $mrpProductProduceLines
 * @property MrpProductProduce[] $mrpProductProduces
 * @property StockProductionLot[] $stockProductionLots
 * @property StockChangeProductQty[] $stockChangeProductQties
 * @property StockMove[] $stockMoves
 * @property StockMoveScrap[] $stockMoveScraps
 * @property StockReturnPickingLine[] $stockReturnPickingLines
 * @property MakeProcurement[] $makeProcurements
 * @property StockWarehouseOrderpoint[] $stockWarehouseOrderpoints
 * @property AccountMoveLine[] $accountMoveLines
 */
class ProductProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_uid', 'write_uid', 'product_tmpl_id'], 'integer'],
            [['create_date', 'message_last_post', 'write_date'], 'safe'],
            [['default_code', 'name_template', 'image_variant'], 'string'],
            [['active'], 'boolean'],
            [['product_tmpl_id'], 'required'],
            [['ean13'], 'string', 'max' => 13]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'create_uid' => Yii::t('Backend', 'Created by'),
            'create_date' => Yii::t('Backend', 'Created on'),
            'ean13' => Yii::t('Backend', 'EAN13 Barcode'),
            'write_uid' => Yii::t('Backend', 'Last Updated by'),
            'message_last_post' => Yii::t('Backend', 'Last Message Date'),
            'default_code' => Yii::t('Backend', 'Internal Reference'),
            'write_date' => Yii::t('Backend', 'Last Updated on'),
            'name_template' => Yii::t('Backend', 'Template Name'),
            'active' => Yii::t('Backend', 'Active'),
            'product_tmpl_id' => Yii::t('Backend', 'Product Template'),
            'image_variant' => Yii::t('Backend', 'Variant Image'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountInvoiceLines()
    {
        return $this->hasMany(AccountInvoiceLine::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrTimesheetInvoiceCreateFinals()
    {
        return $this->hasMany(HrTimesheetInvoiceCreateFinal::className(), ['product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrTimesheetInvoiceCreates()
    {
        return $this->hasMany(HrTimesheetInvoiceCreate::className(), ['product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockQuants()
    {
        return $this->hasMany(StockQuant::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockInventories()
    {
        return $this->hasMany(StockInventory::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockInventoryLines()
    {
        return $this->hasMany(StockInventoryLine::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockPackOperations()
    {
        return $this->hasMany(StockPackOperation::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrderLines()
    {
        return $this->hasMany(PurchaseOrderLine::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockTransferDetailsItems()
    {
        return $this->hasMany(StockTransferDetailsItems::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpBoms()
    {
        return $this->hasMany(MrpBom::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpProductions()
    {
        return $this->hasMany(MrpProduction::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticLines()
    {
        return $this->hasMany(AccountAnalyticLine::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributeValueProductProductRels()
    {
        return $this->hasMany(ProductAttributeValueProductProductRel::className(), ['prod_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricelistItems()
    {
        return $this->hasMany(ProductPricelistItem::className(), ['product_id' => 'id']);
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
    public function getWriteU()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'write_uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTmpl()
    {
        return $this->hasOne(ProductTemplate::className(), ['id' => 'product_tmpl_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountAnalyticInvoiceLines()
    {
        return $this->hasMany(AccountAnalyticInvoiceLine::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrderLines()
    {
        return $this->hasMany(SaleOrderLine::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockMoveConsumes()
    {
        return $this->hasMany(StockMoveConsume::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcurementOrders()
    {
        return $this->hasMany(ProcurementOrder::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrEmployees()
    {
        return $this->hasMany(HrEmployee::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpWorkcenters()
    {
        return $this->hasMany(MrpWorkcenter::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpProductionProductLines()
    {
        return $this->hasMany(MrpProductionProductLine::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpBomLines()
    {
        return $this->hasMany(MrpBomLine::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleAdvancePaymentInvs()
    {
        return $this->hasMany(SaleAdvancePaymentInv::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpProductProduceLines()
    {
        return $this->hasMany(MrpProductProduceLine::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpProductProduces()
    {
        return $this->hasMany(MrpProductProduce::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockProductionLots()
    {
        return $this->hasMany(StockProductionLot::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockChangeProductQties()
    {
        return $this->hasMany(StockChangeProductQty::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockMoves()
    {
        return $this->hasMany(StockMove::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockMoveScraps()
    {
        return $this->hasMany(StockMoveScrap::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockReturnPickingLines()
    {
        return $this->hasMany(StockReturnPickingLine::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMakeProcurements()
    {
        return $this->hasMany(MakeProcurement::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockWarehouseOrderpoints()
    {
        return $this->hasMany(StockWarehouseOrderpoint::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccountMoveLines()
    {
        return $this->hasMany(AccountMoveLine::className(), ['product_id' => 'id']);
    }
}
