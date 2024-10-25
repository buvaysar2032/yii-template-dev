<?php

namespace common\models;

use common\components\helpers\UserUrl;
use common\models\AppActiveRecord;
use himiklab\sortablegrid\SortableGridBehavior;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property int         $id
 * @property string      $title
 * @property string      $title_en
 * @property int|null    $priority
 * @property int         $date
 * @property string|null $description
 * @property string|null $description_en
 * @property string|null $text
 * @property string|null $text_en
 * @property string|null $image
 * @property int         $status
 */

#[Schema(properties: [
    new Property(property: 'id', type: 'int'),
    new Property(property: 'title', type: 'string'),
    new Property(property: 'title_en', type: 'string'),
    new Property(property: 'priority', type: 'int'),
    new Property(property: 'date', type: 'int'),
    new Property(property: 'description', type: 'string'),
    new Property(property: 'description_en', type: 'string'),
    new Property(property: 'text', type: 'string'),
    new Property(property: 'text_en', type: 'string'),
    new Property(property: 'image', type: 'string'),
    new Property(property: 'status', type: 'int'),
])]

class News extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%news}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'title_en', 'date'], 'required'],
            [['priority', 'date', 'status'], 'integer'],
            [['description', 'description_en', 'text', 'text_en'], 'string'],
            [['title', 'title_en', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'title_en' => Yii::t('app', 'Title En'),
            'priority' => Yii::t('app', 'Priority'),
            'date' => Yii::t('app', 'Date'),
            'description' => Yii::t('app', 'Description'),
            'description_en' => Yii::t('app', 'Description En'),
            'text' => Yii::t('app', 'Text'),
            'text_en' => Yii::t('app', 'Text En'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    final public function fields(): array
    {
        return [
            'id',
            'title',
            'title_en',
            'priority',
            'date',
            'description',
            'description_en',
            'text',
            'text_en',
            'image' => fn() => UserUrl::toAbsolute($this->image),
            'status',
        ];
    }
}
