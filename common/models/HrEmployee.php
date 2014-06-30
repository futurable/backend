<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hr_employee".
 *
 * @property integer $id
 * @property integer $create_uid
 * @property string $create_date
 * @property string $write_date
 * @property integer $write_uid
 * @property integer $address_id
 * @property integer $coach_id
 * @property integer $resource_id
 * @property integer $color
 * @property string $message_last_post
 * @property resource $image
 * @property string $marital
 * @property string $identification_id
 * @property integer $job_id
 * @property string $work_phone
 * @property integer $country_id
 * @property integer $bank_account_id
 * @property integer $parent_id
 * @property integer $department_id
 * @property string $otherid
 * @property string $mobile_phone
 * @property string $birthday
 * @property string $sinid
 * @property string $work_email
 * @property string $work_location
 * @property resource $image_medium
 * @property string $name_related
 * @property string $notes
 * @property resource $image_small
 * @property integer $address_home_id
 * @property string $passport_id
 * @property string $gender
 * @property string $ssnid
 *
 * @property EmployeeCategoryRel[] $employeeCategoryRels
 * @property ResUsers $writeU
 * @property ResourceResource $resource
 * @property HrEmployee $parent
 * @property HrEmployee[] $hrEmployees
 * @property HrJob $job
 * @property HrDepartment $department
 * @property ResUsers $createU
 * @property ResCountry $country
 * @property HrEmployee $coach
 * @property ResPartnerBank $bankAccount
 * @property ResPartner $address
 * @property ResPartner $addressHome
 * @property HrDepartment[] $hrDepartments
 */
class HrEmployee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_uid', 'write_uid', 'address_id', 'coach_id', 'resource_id', 'color', 'job_id', 'country_id', 'bank_account_id', 'parent_id', 'department_id', 'address_home_id'], 'integer'],
            [['create_date', 'write_date', 'message_last_post', 'image', 'marital', 'image_medium', 'name_related', 'notes', 'image_small', 'gender'], 'string'],
            [['resource_id'], 'required'],
            [['birthday'], 'safe'],
            [['identification_id', 'work_phone', 'mobile_phone', 'sinid', 'work_location', 'ssnid'], 'string', 'max' => 32],
            [['otherid', 'passport_id'], 'string', 'max' => 64],
            [['work_email'], 'string', 'max' => 240]
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
            'address_id' => Yii::t('Backend', 'Working Address'),
            'coach_id' => Yii::t('Backend', 'Coach'),
            'resource_id' => Yii::t('Backend', 'Resource'),
            'color' => Yii::t('Backend', 'Color Index'),
            'message_last_post' => Yii::t('Backend', 'Last Message Date'),
            'image' => Yii::t('Backend', 'Photo'),
            'marital' => Yii::t('Backend', 'Marital Status'),
            'identification_id' => Yii::t('Backend', 'Identification No'),
            'job_id' => Yii::t('Backend', 'Job Title'),
            'work_phone' => Yii::t('Backend', 'Work Phone'),
            'country_id' => Yii::t('Backend', 'Nationality'),
            'bank_account_id' => Yii::t('Backend', 'Bank Account Number'),
            'parent_id' => Yii::t('Backend', 'Manager'),
            'department_id' => Yii::t('Backend', 'Department'),
            'otherid' => Yii::t('Backend', 'Other Id'),
            'mobile_phone' => Yii::t('Backend', 'Work Mobile'),
            'birthday' => Yii::t('Backend', 'Date of Birth'),
            'sinid' => Yii::t('Backend', 'SIN No'),
            'work_email' => Yii::t('Backend', 'Work Email'),
            'work_location' => Yii::t('Backend', 'Office Location'),
            'image_medium' => Yii::t('Backend', 'Medium-sized photo'),
            'name_related' => Yii::t('Backend', 'Name'),
            'notes' => Yii::t('Backend', 'Notes'),
            'image_small' => Yii::t('Backend', 'Smal-sized photo'),
            'address_home_id' => Yii::t('Backend', 'Home Address'),
            'passport_id' => Yii::t('Backend', 'Passport No'),
            'gender' => Yii::t('Backend', 'Gender'),
            'ssnid' => Yii::t('Backend', 'SSN No'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeCategoryRels()
    {
        return $this->hasMany(EmployeeCategoryRel::className(), ['emp_id' => 'id']);
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
    public function getResource()
    {
        return $this->hasOne(ResourceResource::className(), ['id' => 'resource_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(HrEmployee::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrEmployees()
    {
        return $this->hasMany(HrEmployee::className(), ['coach_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(HrJob::className(), ['id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(HrDepartment::className(), ['id' => 'department_id']);
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
    public function getCountry()
    {
        return $this->hasOne(ResCountry::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoach()
    {
        return $this->hasOne(HrEmployee::className(), ['id' => 'coach_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankAccount()
    {
        return $this->hasOne(ResPartnerBank::className(), ['id' => 'bank_account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(ResPartner::className(), ['id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddressHome()
    {
        return $this->hasOne(ResPartner::className(), ['id' => 'address_home_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrDepartments()
    {
        return $this->hasMany(HrDepartment::className(), ['manager_id' => 'id']);
    }
}
