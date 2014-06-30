<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "token_setup".
 *
 * @property integer $id
 * @property string $description
 * @property integer $create_init_data
 * @property integer $create_demo_data
 * @property integer $create_purchasing_orders
 * @property integer $token_customer_id
 * @property integer $industries
 *
 * @property TokenKey[] $tokenKeys
 * @property TokenCustomer $tokenCustomer
 */
class TokenSetup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'token_setup';
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
            [['description', 'token_customer_id', 'industries'], 'required'],
            [['create_init_data', 'create_demo_data', 'create_purchasing_orders', 'token_customer_id', 'industries'], 'integer'],
            [['description'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'create_init_data' => Yii::t('app', 'Create Init Data'),
            'create_demo_data' => Yii::t('app', 'Create Demo Data'),
            'create_purchasing_orders' => Yii::t('app', 'Create Purchasing Orders'),
            'token_customer_id' => Yii::t('app', 'Token Customer ID'),
            'industries' => Yii::t('app', 'Industries'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokenKeys()
    {
        return $this->hasMany(TokenKey::className(), ['token_setup_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokenCustomer()
    {
        return $this->hasOne(TokenCustomer::className(), ['id' => 'token_customer_id']);
    }
}
