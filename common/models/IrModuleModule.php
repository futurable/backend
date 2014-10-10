<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ir_module_module".
 *
 * @property integer $id
 * @property integer $create_uid
 * @property string $create_date
 * @property string $write_date
 * @property integer $write_uid
 * @property string $website
 * @property string $summary
 * @property string $name
 * @property string $author
 * @property string $icon
 * @property string $state
 * @property string $latest_version
 * @property string $shortdesc
 * @property integer $category_id
 * @property string $description
 * @property boolean $application
 * @property boolean $demo
 * @property boolean $web
 * @property string $license
 * @property integer $sequence
 * @property boolean $auto_install
 * @property string $menus_by_module
 * @property string $maintainer
 * @property string $contributors
 * @property string $views_by_module
 * @property string $reports_by_module
 * @property string $url
 * @property string $published_version
 *
 * @property ResUsers $createU
 * @property ResUsers $writeU
 * @property IrModuleCategory $category
 * @property IrModuleModuleDependency[] $irModuleModuleDependencies
 * @property IrModelConstraint[] $irModelConstraints
 * @property IrModelRelation[] $irModelRelations
 * @property RelModulesLangexport[] $relModulesLangexports
 */
class IrModuleModule extends \yii\db\ActiveRecord
{
    # A helper for JQuery
    public $text;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ir_module_module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_uid', 'write_uid', 'category_id', 'sequence'], 'integer'],
            [['create_date', 'write_date'], 'safe'],
            [['website', 'summary', 'name', 'author', 'icon', 'latest_version', 'shortdesc', 'description', 'menus_by_module', 'maintainer', 'contributors', 'views_by_module', 'reports_by_module', 'url', 'published_version'], 'string'],
            [['name'], 'required'],
            [['application', 'demo', 'web', 'auto_install'], 'boolean'],
            [['state'], 'string', 'max' => 16],
            [['license'], 'string', 'max' => 32],
            [['name'], 'unique'],
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
            'create_uid' => Yii::t('Backend', 'Create Uid'),
            'create_date' => Yii::t('Backend', 'Create Date'),
            'write_date' => Yii::t('Backend', 'Write Date'),
            'write_uid' => Yii::t('Backend', 'Write Uid'),
            'website' => Yii::t('Backend', 'Website'),
            'summary' => Yii::t('Backend', 'Summary'),
            'name' => Yii::t('Backend', 'Name'),
            'author' => Yii::t('Backend', 'Author'),
            'icon' => Yii::t('Backend', 'Icon'),
            'state' => Yii::t('Backend', 'State'),
            'latest_version' => Yii::t('Backend', 'Latest Version'),
            'shortdesc' => Yii::t('Backend', 'Shortdesc'),
            'category_id' => Yii::t('Backend', 'Category ID'),
            'description' => Yii::t('Backend', 'Description'),
            'application' => Yii::t('Backend', 'Application'),
            'demo' => Yii::t('Backend', 'Demo'),
            'web' => Yii::t('Backend', 'Web'),
            'license' => Yii::t('Backend', 'License'),
            'sequence' => Yii::t('Backend', 'Sequence'),
            'auto_install' => Yii::t('Backend', 'Auto Install'),
            'menus_by_module' => Yii::t('Backend', 'Menus'),
            'maintainer' => Yii::t('Backend', 'Maintainer'),
            'contributors' => Yii::t('Backend', 'Contributors'),
            'views_by_module' => Yii::t('Backend', 'Views'),
            'reports_by_module' => Yii::t('Backend', 'Reports'),
            'url' => Yii::t('Backend', 'URL'),
            'published_version' => Yii::t('Backend', 'Published Version'),
        ];
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
    public function getCategory()
    {
        return $this->hasOne(IrModuleCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModuleModuleDependencies()
    {
        return $this->hasMany(IrModuleModuleDependency::className(), ['module_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModelConstraints()
    {
        return $this->hasMany(IrModelConstraint::className(), ['module' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModelRelations()
    {
        return $this->hasMany(IrModelRelation::className(), ['module' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelModulesLangexports()
    {
        return $this->hasMany(RelModulesLangexport::className(), ['module_id' => 'id']);
    }
}
