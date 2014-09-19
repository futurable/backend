<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bank_profile_field".
 *
 * @property integer $id
 * @property string $varname
 * @property string $title
 * @property string $field_type
 * @property integer $field_size
 * @property integer $field_size_min
 * @property integer $required
 * @property string $match
 * @property string $range
 * @property string $error_message
 * @property string $other_validator
 * @property string $default
 * @property string $widget
 * @property string $widgetparams
 * @property integer $position
 * @property integer $visible
 */
class BankProfileField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank_profile_field';
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
            [['varname', 'title', 'field_type'], 'required'],
            [['field_size', 'field_size_min', 'required', 'position', 'visible'], 'integer'],
            [['varname', 'field_type'], 'string', 'max' => 50],
            [['title', 'match', 'range', 'error_message', 'default', 'widget'], 'string', 'max' => 255],
            [['other_validator', 'widgetparams'], 'string', 'max' => 5000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'varname' => Yii::t('Backend', 'Varname'),
            'title' => Yii::t('Backend', 'Title'),
            'field_type' => Yii::t('Backend', 'Field Type'),
            'field_size' => Yii::t('Backend', 'Field Size'),
            'field_size_min' => Yii::t('Backend', 'Field Size Min'),
            'required' => Yii::t('Backend', 'Required'),
            'match' => Yii::t('Backend', 'Match'),
            'range' => Yii::t('Backend', 'Range'),
            'error_message' => Yii::t('Backend', 'Error Message'),
            'other_validator' => Yii::t('Backend', 'Other Validator'),
            'default' => Yii::t('Backend', 'Default'),
            'widget' => Yii::t('Backend', 'Widget'),
            'widgetparams' => Yii::t('Backend', 'Widgetparams'),
            'position' => Yii::t('Backend', 'Position'),
            'visible' => Yii::t('Backend', 'Visible'),
        ];
    }
}
