<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "costbenefit_item".
 *
 * @property integer $id
 * @property string $value
 * @property integer $costbenefit_calculation_id
 * @property integer $costbenefit_item_type_id
 *
 * @property CostbenefitCalculation $costbenefitCalculation
 * @property CostbenefitItemType $costbenefitItemType
 */
class CostbenefitItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'costbenefit_item';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_core');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value', 'costbenefit_calculation_id', 'costbenefit_item_type_id'], 'required'],
            [['value'], 'number'],
            [['costbenefit_calculation_id', 'costbenefit_item_type_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'value' => Yii::t('app', 'Value'),
            'costbenefit_calculation_id' => Yii::t('app', 'Costbenefit Calculation ID'),
            'costbenefit_item_type_id' => Yii::t('app', 'Costbenefit Item Type ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCostbenefitCalculation()
    {
        return $this->hasOne(CostbenefitCalculation::className(), ['id' => 'costbenefit_calculation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCostbenefitItemType()
    {
        return $this->hasOne(CostbenefitItemType::className(), ['id' => 'costbenefit_item_type_id']);
    }
}
