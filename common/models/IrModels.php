<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ir_model".
 *
 * @property integer $id
 * @property string $model
 * @property string $name
 * @property string $state
 * @property string $info
 * @property integer $create_uid
 * @property string $create_date
 * @property integer $write_uid
 * @property string $write_date
 *
 * @property IrModelFields[] $irModelFields
 * @property IrRule[] $irRules
 * @property IrActServer[] $irActServers
 * @property IrModelConstraint[] $irModelConstraints
 * @property IrModelRelation[] $irModelRelations
 * @property IrModelAccess[] $irModelAccesses
 * @property MultiCompanyDefault[] $multiCompanyDefaults
 * @property MailAlias[] $mailAliases
 * @property FetchmailServer[] $fetchmailServers
 * @property BaseActionRule[] $baseActionRules
 * @property CrmCaseCateg[] $crmCaseCategs
 * @property EmailTemplate[] $emailTemplates
 * @property EmailTemplatePreview[] $emailTemplatePreviews
 * @property IrValues[] $irValues
 * @property ResUsers $createU
 * @property ResUsers $writeU
 */
class IrModels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ir_model';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'name'], 'required'],
            [['model', 'name', 'state', 'info'], 'string'],
            [['create_uid', 'write_uid'], 'integer'],
            [['create_date', 'write_date'], 'safe'],
            [['model'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'model' => Yii::t('app', 'Model'),
            'name' => Yii::t('app', 'Name'),
            'state' => Yii::t('app', 'State'),
            'info' => Yii::t('app', 'Info'),
            'create_uid' => Yii::t('app', 'Created by'),
            'create_date' => Yii::t('app', 'Created on'),
            'write_uid' => Yii::t('app', 'Last Updated by'),
            'write_date' => Yii::t('app', 'Last Updated on'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModelFields()
    {
        return $this->hasMany(IrModelFields::className(), ['model_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrRules()
    {
        return $this->hasMany(IrRule::className(), ['model_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrActServers()
    {
        return $this->hasMany(IrActServer::className(), ['model_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModelConstraints()
    {
        return $this->hasMany(IrModelConstraint::className(), ['model' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModelRelations()
    {
        return $this->hasMany(IrModelRelation::className(), ['model' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrModelAccesses()
    {
        return $this->hasMany(IrModelAccess::className(), ['model_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMultiCompanyDefaults()
    {
        return $this->hasMany(MultiCompanyDefault::className(), ['object_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailAliases()
    {
        return $this->hasMany(MailAlias::className(), ['alias_parent_model_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFetchmailServers()
    {
        return $this->hasMany(FetchmailServer::className(), ['object_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseActionRules()
    {
        return $this->hasMany(BaseActionRule::className(), ['model_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrmCaseCategs()
    {
        return $this->hasMany(CrmCaseCateg::className(), ['object_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailTemplates()
    {
        return $this->hasMany(EmailTemplate::className(), ['sub_object' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailTemplatePreviews()
    {
        return $this->hasMany(EmailTemplatePreview::className(), ['sub_object' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIrValues()
    {
        return $this->hasMany(IrValues::className(), ['model_id' => 'id']);
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
}
