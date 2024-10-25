<?php

namespace common\models;

use common\components\helpers\UserUrl;
use common\models\AppActiveRecord;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property int         $id
 * @property string      $name
 * @property string      $email
 * @property string      $message
 * @property int|null    $created_at
 * @property int|null    $updated_at
 * @property int|null    $moderation_status
 * @property string|null $comment
 */

#[Schema(properties: [
    new Property(property: 'id', type: 'int'),
    new Property(property: 'name', type: 'string'),
    new Property(property: 'email', type: 'string'),
    new Property(property: 'message', type: 'string'),
    new Property(property: 'created_at', type: 'int'),
    new Property(property: 'updated_at', type: 'int'),
    new Property(property: 'moderation_status', type: 'int'),
    new Property(property: 'comment', type: 'string'),
])]

class Feedback extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%feedback}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'email', 'message'], 'required'],
            [['message'], 'string'],
            [['created_at', 'updated_at', 'moderation_status'], 'integer'],
            [['name', 'email', 'comment'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'message' => Yii::t('app', 'Message'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'moderation_status' => Yii::t('app', 'Moderation Status'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }

    public function fields(): array
    {
        return ['id', 'name', 'email', 'message', 'created_at', 'updated_at', 'moderation_status', 'comment'];
    }
}
