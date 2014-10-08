<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_template".
 *
 * @property integer $id
 * @property double $warranty
 * @property integer $uos_id
 * @property string $list_price
 * @property string $weight
 * @property integer $color
 * @property resource $image
 * @property integer $write_uid
 * @property string $mes_type
 * @property integer $uom_id
 * @property string $description_purchase
 * @property string $create_date
 * @property string $uos_coeff
 * @property integer $create_uid
 * @property boolean $rental
 * @property integer $product_manager
 * @property string $message_last_post
 * @property integer $company_id
 * @property string $state
 * @property integer $uom_po_id
 * @property string $type
 * @property string $description
 * @property string $weight_net
 * @property double $volume
 * @property string $write_date
 * @property boolean $active
 * @property integer $categ_id
 * @property boolean $sale_ok
 * @property resource $image_medium
 * @property string $name
 * @property string $description_sale
 * @property resource $image_small
 * @property string $loc_rack
 * @property boolean $track_incoming
 * @property double $sale_delay
 * @property boolean $track_all
 * @property boolean $track_outgoing
 * @property string $loc_row
 * @property string $loc_case
 * @property boolean $purchase_ok
 * @property double $produce_delay
 * @property boolean $track_production
 * @property boolean $auto_create_task
 * @property integer $project_id
 *
 * @property StockRouteProduct[] $stockRouteProducts
 * @property MrpBom[] $mrpBoms
 * @property ProductPriceHistory[] $productPriceHistories
 * @property ProductAttributePrice[] $productAttributePrices
 * @property ProductAttributeLine[] $productAttributeLines
 * @property ProductPackaging[] $productPackagings
 * @property ProductSupplierinfo[] $productSupplierinfos
 * @property ProductPricelistItem[] $productPricelistItems
 * @property ProductProduct[] $productProducts
 * @property ProductSupplierTaxesRel[] $productSupplierTaxesRels
 * @property ProductTaxesRel[] $productTaxesRels
 * @property ProjectProject $project
 * @property ProductUom $uos
 * @property ProductCategory $categ
 * @property ProductUom $uomPo
 * @property ResUsers $productManager
 * @property ResUsers $writeU
 * @property ResCompany $company
 * @property ResUsers $createU
 * @property ProductUom $uom
 */
class ProductTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warranty', 'list_price', 'weight', 'uos_coeff', 'weight_net', 'volume', 'sale_delay', 'produce_delay'], 'number'],
            [['uos_id', 'color', 'write_uid', 'uom_id', 'create_uid', 'product_manager', 'company_id', 'uom_po_id', 'categ_id', 'project_id'], 'integer'],
            [['image', 'mes_type', 'description_purchase', 'state', 'type', 'description', 'image_medium', 'name', 'description_sale', 'image_small'], 'string'],
            [['uom_id', 'uom_po_id', 'type', 'categ_id', 'name'], 'required'],
            [['create_date', 'message_last_post', 'write_date'], 'safe'],
            [['rental', 'active', 'sale_ok', 'track_incoming', 'track_all', 'track_outgoing', 'purchase_ok', 'track_production', 'auto_create_task'], 'boolean'],
            [['loc_rack', 'loc_row', 'loc_case'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'warranty' => Yii::t('Backend', 'Warranty'),
            'uos_id' => Yii::t('Backend', 'Unit of Sale'),
            'list_price' => Yii::t('Backend', 'Sale Price'),
            'weight' => Yii::t('Backend', 'Gross Weight'),
            'color' => Yii::t('Backend', 'Color Index'),
            'image' => Yii::t('Backend', 'Image'),
            'write_uid' => Yii::t('Backend', 'Last Updated by'),
            'mes_type' => Yii::t('Backend', 'Measure Type'),
            'uom_id' => Yii::t('Backend', 'Unit of Measure'),
            'description_purchase' => Yii::t('Backend', 'Purchase Description'),
            'create_date' => Yii::t('Backend', 'Created on'),
            'uos_coeff' => Yii::t('Backend', 'Unit of Measure -> UOS Coeff'),
            'create_uid' => Yii::t('Backend', 'Created by'),
            'rental' => Yii::t('Backend', 'Can be Rent'),
            'product_manager' => Yii::t('Backend', 'Product Manager'),
            'message_last_post' => Yii::t('Backend', 'Last Message Date'),
            'company_id' => Yii::t('Backend', 'Company'),
            'state' => Yii::t('Backend', 'Status'),
            'uom_po_id' => Yii::t('Backend', 'Purchase Unit of Measure'),
            'type' => Yii::t('Backend', 'Product Type'),
            'description' => Yii::t('Backend', 'Description'),
            'weight_net' => Yii::t('Backend', 'Net Weight'),
            'volume' => Yii::t('Backend', 'Volume'),
            'write_date' => Yii::t('Backend', 'Last Updated on'),
            'active' => Yii::t('Backend', 'Active'),
            'categ_id' => Yii::t('Backend', 'Internal Category'),
            'sale_ok' => Yii::t('Backend', 'Can be Sold'),
            'image_medium' => Yii::t('Backend', 'Medium-sized image'),
            'name' => Yii::t('Backend', 'Name'),
            'description_sale' => Yii::t('Backend', 'Sale Description'),
            'image_small' => Yii::t('Backend', 'Small-sized image'),
            'loc_rack' => Yii::t('Backend', 'Rack'),
            'track_incoming' => Yii::t('Backend', 'Track Incoming Lots'),
            'sale_delay' => Yii::t('Backend', 'Customer Lead Time'),
            'track_all' => Yii::t('Backend', 'Full Lots Traceability'),
            'track_outgoing' => Yii::t('Backend', 'Track Outgoing Lots'),
            'loc_row' => Yii::t('Backend', 'Row'),
            'loc_case' => Yii::t('Backend', 'Case'),
            'purchase_ok' => Yii::t('Backend', 'Can be Purchased'),
            'produce_delay' => Yii::t('Backend', 'Manufacturing Lead Time'),
            'track_production' => Yii::t('Backend', 'Track Manufacturing Lots'),
            'auto_create_task' => Yii::t('Backend', 'Create Task Automatically'),
            'project_id' => Yii::t('Backend', 'Project'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockRouteProducts()
    {
        return $this->hasMany(StockRouteProduct::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrpBoms()
    {
        return $this->hasMany(MrpBom::className(), ['product_tmpl_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPriceHistories()
    {
        return $this->hasMany(ProductPriceHistory::className(), ['product_template_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributePrices()
    {
        return $this->hasMany(ProductAttributePrice::className(), ['product_tmpl_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributeLines()
    {
        return $this->hasMany(ProductAttributeLine::className(), ['product_tmpl_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPackagings()
    {
        return $this->hasMany(ProductPackaging::className(), ['product_tmpl_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSupplierinfos()
    {
        return $this->hasMany(ProductSupplierinfo::className(), ['product_tmpl_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPricelistItems()
    {
        return $this->hasMany(ProductPricelistItem::className(), ['product_tmpl_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductProducts()
    {
        return $this->hasMany(ProductProduct::className(), ['product_tmpl_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductSupplierTaxesRels()
    {
        return $this->hasMany(ProductSupplierTaxesRel::className(), ['prod_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTaxesRels()
    {
        return $this->hasMany(ProductTaxesRel::className(), ['prod_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(ProjectProject::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUos()
    {
        return $this->hasOne(ProductUom::className(), ['id' => 'uos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCateg()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'categ_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUomPo()
    {
        return $this->hasOne(ProductUom::className(), ['id' => 'uom_po_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductManager()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'product_manager']);
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
    public function getCreateU()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'create_uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUom()
    {
        return $this->hasOne(ProductUom::className(), ['id' => 'uom_id']);
    }
}
