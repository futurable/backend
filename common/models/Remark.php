<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "remark".
 *
 * @property integer $id
 * @property string $description
 * @property string $event_date
 * @property string $create_date
 * @property integer $significance
 * @property integer $company_id
 *
 * @property Company $company
 */
class Remark extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'remark';
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
            [['event_date', 'create_date', 'company_id'], 'required'],
            [['event_date', 'create_date'], 'safe'],
            [['significance', 'company_id'], 'integer'],
            [['description'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'description' => Yii::t('Backend', 'Description'),
            'event_date' => Yii::t('Backend', 'Event Date'),
            'create_date' => Yii::t('Backend', 'Create Date'),
            'significance' => Yii::t('Backend', 'Significance'),
            'company_id' => Yii::t('Backend', 'Company ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
