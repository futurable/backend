<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ir_module_category".
 *
 * @property integer $id
 * @property integer $create_uid
 * @property string $create_date
 * @property string $write_date
 * @property integer $write_uid
 * @property integer $parent_id
 * @property string $name
 * @property integer $sequence
 * @property boolean $visible
 * @property string $description
 *
 * @property ResUsers $writeU
 * @property ResUsers $createU
 * @property IrModuleCategory $parent
 * @property IrModuleCategory[] $irModuleCategories
 * @property IrModuleModule[] $irModuleModules
 * @property ResGroups[] $resGroups
 */
class IrModuleCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ir_module_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_uid', 'write_uid', 'parent_id', 'sequence'], 'integer'],
            [['create_date', 'write_date'], 'safe'],
            [['name'], 'required'],
            [['name', 'description'], 'string'],
            [['visible'], 'boolean']
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
            'parent_id' => Yii::t('Backend', 'Parent ID'),
            'name' => Yii::t('Backend', 'Name'),
            'sequence' => Yii::t('Backend', 'Sequence'),
            'visible' => Yii::t('Backend', 'Visible'),
            'description' => Yii::t('Backend', 'Description'),
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
    public function getCreateU()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'create_uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(IrModuleCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModuleCategories()
    {
        return $this->hasMany(IrModuleCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModuleModules()
    {
        return $this->hasMany(IrModuleModule::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResGroups()
    {
        return $this->hasMany(ResGroups::className(), ['category_id' => 'id']);
    }
}
