<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mail_message".
 *
 * @property integer $id
 * @property string $create_date
 * @property string $write_date
 * @property integer $mail_server_id
 * @property integer $write_uid
 * @property string $subject
 * @property integer $create_uid
 * @property integer $parent_id
 * @property integer $subtype_id
 * @property integer $res_id
 * @property string $message_id
 * @property string $body
 * @property string $model
 * @property string $record_name
 * @property boolean $no_auto_thread
 * @property string $date
 * @property integer $author_id
 * @property string $type
 * @property string $reply_to
 * @property string $email_from
 * @property boolean $website_published
 *
 * @property MailComposeMessage[] $mailComposeMessages
 * @property MailMail[] $mailMails
 * @property IrMailServer $mailServer
 * @property MailMessage $parent
 * @property MailMessage[] $mailMessages
 * @property MailMessageSubtype $subtype
 * @property ResPartner $author
 * @property ResUsers $writeU
 * @property ResUsers $createU
 * @property MailMessageResPartnerRel[] $mailMessageResPartnerRels
 * @property MailNotification[] $mailNotifications
 * @property MailVote[] $mailVotes
 * @property MessageAttachmentRel[] $messageAttachmentRels
 */
class MailMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mail_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date', 'write_date', 'date'], 'safe'],
            [['mail_server_id', 'write_uid', 'create_uid', 'parent_id', 'subtype_id', 'res_id', 'author_id'], 'integer'],
            [['subject', 'message_id', 'body', 'record_name', 'reply_to', 'email_from'], 'string'],
            [['no_auto_thread', 'website_published'], 'boolean'],
            [['model'], 'string', 'max' => 128],
            [['type'], 'string', 'max' => 12],
            [['mail_server_id'], 'exist', 'skipOnError' => true, 'targetClass' => IrMailServer::className(), 'targetAttribute' => ['mail_server_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailMessage::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['subtype_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailMessageSubtype::className(), 'targetAttribute' => ['subtype_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => ResPartner::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['write_uid'], 'exist', 'skipOnError' => true, 'targetClass' => ResUsers::className(), 'targetAttribute' => ['write_uid' => 'id']],
            [['create_uid'], 'exist', 'skipOnError' => true, 'targetClass' => ResUsers::className(), 'targetAttribute' => ['create_uid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('Backend', 'ID'),
            'create_date' => Yii::t('Backend', 'Create Date'),
            'write_date' => Yii::t('Backend', 'Write Date'),
            'mail_server_id' => Yii::t('Backend', 'Mail Server ID'),
            'write_uid' => Yii::t('Backend', 'Write Uid'),
            'subject' => Yii::t('Backend', 'Subject'),
            'create_uid' => Yii::t('Backend', 'Create Uid'),
            'parent_id' => Yii::t('Backend', 'Parent ID'),
            'subtype_id' => Yii::t('Backend', 'Subtype ID'),
            'res_id' => Yii::t('Backend', 'Res ID'),
            'message_id' => Yii::t('Backend', 'Message ID'),
            'body' => Yii::t('Backend', 'Body'),
            'model' => Yii::t('Backend', 'Model'),
            'record_name' => Yii::t('Backend', 'Record Name'),
            'no_auto_thread' => Yii::t('Backend', 'No Auto Thread'),
            'date' => Yii::t('Backend', 'Date'),
            'author_id' => Yii::t('Backend', 'Author ID'),
            'type' => Yii::t('Backend', 'Type'),
            'reply_to' => Yii::t('Backend', 'Reply To'),
            'email_from' => Yii::t('Backend', 'Email From'),
            'website_published' => Yii::t('Backend', 'Website Published'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailComposeMessages()
    {
        return $this->hasMany(MailComposeMessage::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailMails()
    {
        return $this->hasMany(MailMail::className(), ['mail_message_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailServer()
    {
        return $this->hasOne(IrMailServer::className(), ['id' => 'mail_server_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(MailMessage::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailMessages()
    {
        return $this->hasMany(MailMessage::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubtype()
    {
        return $this->hasOne(MailMessageSubtype::className(), ['id' => 'subtype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(ResPartner::className(), ['id' => 'author_id']);
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
    public function getMailMessageResPartnerRels()
    {
        return $this->hasMany(MailMessageResPartnerRel::className(), ['mail_message_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailNotifications()
    {
        return $this->hasMany(MailNotification::className(), ['message_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailVotes()
    {
        return $this->hasMany(MailVote::className(), ['message_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessageAttachmentRels()
    {
        return $this->hasMany(MessageAttachmentRel::className(), ['message_id' => 'id']);
    }
}
