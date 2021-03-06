<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bank_profile".
 *
 * @property integer $user_id
 * @property string $lastname
 * @property string $firstname
 * @property string $company
 */
class BankProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank_profile';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_bank');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['lastname', 'firstname'], 'string', 'max' => 50],
            [['company'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('Backend', 'User ID'),
            'lastname' => Yii::t('Backend', 'Lastname'),
            'firstname' => Yii::t('Backend', 'Firstname'),
            'company' => Yii::t('Backend', 'Company'),
        ];
    }
}
