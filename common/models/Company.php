<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $tag
 * @property string $business_id
 * @property string $email
 * @property integer $employees
 * @property integer $active
 * @property string $create_time
 * @property string $bank_account_created
 * @property string $openerp_database_created
 * @property string $backend_user_created
 * @property string $account_mail_sent
 * @property integer $token_key_id
 * @property integer $industry_id
 * @property integer $token_customer_id
 *
 * @property TokenKey $tokenKey
 * @property Industry $industry
 * @property TokenCustomer $tokenCustomer
 * @property CompanyPasswords[] $companyPasswords
 * @property Contact[] $contacts 
 * @property CostbenefitCalculation[] $costbenefitCalculations
 * @property Order[] $orders
 * @property Remark $remark
 * @property Salary[] $salaries
 * @property User[] $users 
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
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
            [['name', 'tag', 'business_id', 'email', 'employees', 'token_key_id', 'industry_id', 'token_customer_id'], 'required'],
            [['employees', 'active', 'token_key_id', 'industry_id', 'token_customer_id'], 'integer'],
            [['create_time', 'bank_account_created', 'openerp_database_created', 'backend_user_created', 'account_mail_sent'], 'safe'],
            [['name', 'email'], 'string', 'max' => 256],
            [['tag'], 'string', 'max' => 32],
            [['business_id'], 'string', 'max' => 9],
            [['tag'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Company', 'ID'),
           'name' => Yii::t('Company', 'Company name'),
           'tag' => Yii::t('Company', 'Company identifaction tag (short name)'),
           'business_id' => Yii::t('Company', 'Business ID'),
           'email' => Yii::t('Company', 'Email'),
           'employees' => Yii::t('Company', 'Employees'),
           'active' => Yii::t('Company', 'Active'),
           'create_time' => Yii::t('Company', 'Create Time'),
           'bank_account_created' => Yii::t('Company', 'Bank Account Created'),
           'openerp_database_created' => Yii::t('Company', 'Openerp Database Created'),
           'backend_user_created' => Yii::t('Company', 'Backend User Created'),
           'account_mail_sent' => Yii::t('Company', 'Account Mail Sent'),
           'token_key_id' => Yii::t('Company', 'Token Key ID'),
           'industry_id' => Yii::t('Company', 'Industry ID'),
           'token_customer_id' => Yii::t('Company', 'Token Customer ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokenKey()
    {
        return $this->hasOne(TokenKey::className(), ['id' => 'token_key_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustry()
    {
        return $this->hasOne(Industry::className(), ['id' => 'industry_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokenCustomer()
    {
        return $this->hasOne(TokenCustomer::className(), ['id' => 'token_customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyPasswords()
    {
        return $this->hasOne(CompanyPasswords::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCostbenefitCalculations()
    {
        return $this->hasMany(CostbenefitCalculation::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRemark()
    {
        return $this->hasOne(Remark::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasMany(Salary::className(), ['company_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['company_id' => 'id']);
    }
}
