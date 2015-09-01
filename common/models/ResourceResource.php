<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resource_resource".
 *
 * @property integer $id
 * @property integer $create_uid
 * @property double $time_efficiency
 * @property string $code
 * @property integer $user_id
 * @property string $name
 * @property integer $company_id
 * @property integer $write_uid
 * @property string $write_date
 * @property integer $calendar_id
 * @property boolean $active
 * @property string $create_date
 * @property string $resource_type
 *
 * @property HrEmployee[] $hrEmployees
 * @property ResourceCalendarLeaves[] $resourceCalendarLeaves
 * @property ResCompany $company
 * @property ResUsers $createU
 * @property ResUsers $user
 * @property ResUsers $writeU
 * @property ResourceCalendar $calendar
 */
class ResourceResource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resource_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_uid', 'user_id', 'company_id', 'write_uid', 'calendar_id'], 'integer'],
            [['time_efficiency', 'name', 'resource_type'], 'required'],
            [['time_efficiency'], 'number'],
            [['name', 'resource_type'], 'string'],
            [['write_date', 'create_date'], 'safe'],
            [['active'], 'boolean'],
            [['code'], 'string', 'max' => 16],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => ResCompany::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['create_uid'], 'exist', 'skipOnError' => true, 'targetClass' => ResUsers::className(), 'targetAttribute' => ['create_uid' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => ResUsers::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['write_uid'], 'exist', 'skipOnError' => true, 'targetClass' => ResUsers::className(), 'targetAttribute' => ['write_uid' => 'id']],
            [['calendar_id'], 'exist', 'skipOnError' => true, 'targetClass' => ResourceCalendar::className(), 'targetAttribute' => ['calendar_id' => 'id']],
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
            'time_efficiency' => Yii::t('Backend', 'Time Efficiency'),
            'code' => Yii::t('Backend', 'Code'),
            'user_id' => Yii::t('Backend', 'User ID'),
            'name' => Yii::t('Backend', 'Name'),
            'company_id' => Yii::t('Backend', 'Company ID'),
            'write_uid' => Yii::t('Backend', 'Write Uid'),
            'write_date' => Yii::t('Backend', 'Write Date'),
            'calendar_id' => Yii::t('Backend', 'Calendar ID'),
            'active' => Yii::t('Backend', 'Active'),
            'create_date' => Yii::t('Backend', 'Create Date'),
            'resource_type' => Yii::t('Backend', 'Resource Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrEmployees()
    {
        return $this->hasMany(HrEmployee::className(), ['resource_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResourceCalendarLeaves()
    {
        return $this->hasMany(ResourceCalendarLeaves::className(), ['resource_id' => 'id']);
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
    public function getUser()
    {
        return $this->hasOne(ResUsers::className(), ['id' => 'user_id']);
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
    public function getCalendar()
    {
        return $this->hasOne(ResourceCalendar::className(), ['id' => 'calendar_id']);
    }
}
