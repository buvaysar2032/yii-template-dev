<?php

namespace common\models;

use common\components\helpers\UserUrl;
use common\models\AppActiveRecord;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%tea}}".
 *
 * @property int                 $id
 * @property int                 $tea_collection_id
 * @property string              $title
 * @property string              $title_en
 * @property string|null         $subtitle
 * @property string|null         $subtitle_en
 * @property string|null         $description
 * @property string|null         $description_en
 * @property string|null         $background_image
 * @property string|null         $stack_image
 * @property string|null         $stack_image_en
 * @property string|null         $weight
 * @property string|null         $weight_en
 * @property string|null         $brewing_temperature
 * @property string|null         $brewing_temperature_en
 * @property string|null         $brewing_time
 * @property string|null         $brewing_time_en
 * @property int                 $buy_available
 * @property string|null         $link
 * @property string|null         $link_en
 * @property int|null            $priority
 *
 * @property-read TeaCollections $teaCollection
 */

#[Schema(properties: [
    new Property(property: 'id', type: 'int'),
    new Property(property: 'tea_collection_id', type: 'int'),
    new Property(property: 'title', type: 'string'),
    new Property(property: 'title_en', type: 'string'),
    new Property(property: 'subtitle', type: 'string'),
    new Property(property: 'subtitle_en', type: 'string'),
    new Property(property: 'description', type: 'string'),
    new Property(property: 'description_en', type: 'string'),
    new Property(property: 'background_image', type: 'string'),
    new Property(property: 'stack_image', type: 'string'),
    new Property(property: 'stack_image_en', type: 'string'),
    new Property(property: 'weight', type: 'string'),
    new Property(property: 'weight_en', type: 'string'),
    new Property(property: 'brewing_temperature', type: 'string'),
    new Property(property: 'brewing_temperature_en', type: 'string'),
    new Property(property: 'brewing_time', type: 'string'),
    new Property(property: 'brewing_time_en', type: 'string'),
    new Property(property: 'buy_available', type: 'int'),
    new Property(property: 'link', type: 'string'),
    new Property(property: 'link_en', type: 'string'),
    new Property(property: 'priority', type: 'int'),
])]

class Tea extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%tea}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['tea_collection_id', 'title', 'title_en'], 'required'],
            [['tea_collection_id', 'buy_available', 'priority'], 'integer'],
            [['subtitle', 'subtitle_en', 'description', 'description_en', 'weight', 'weight_en', 'brewing_temperature', 'brewing_temperature_en', 'brewing_time', 'brewing_time_en', 'link', 'link_en'], 'string'],
            [['title', 'title_en', 'background_image', 'stack_image', 'stack_image_en'], 'string', 'max' => 255],
            [['tea_collection_id'], 'exist', 'skipOnError' => true, 'targetClass' => TeaCollections::class, 'targetAttribute' => ['tea_collection_id' => 'id']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tea_collection_id' => Yii::t('app', 'Tea Collection ID'),
            'title' => Yii::t('app', 'Title'),
            'title_en' => Yii::t('app', 'Title En'),
            'subtitle' => Yii::t('app', 'Subtitle'),
            'subtitle_en' => Yii::t('app', 'Subtitle En'),
            'description' => Yii::t('app', 'Description'),
            'description_en' => Yii::t('app', 'Description En'),
            'background_image' => Yii::t('app', 'Background Image'),
            'stack_image' => Yii::t('app', 'Stack Image'),
            'stack_image_en' => Yii::t('app', 'Stack Image En'),
            'weight' => Yii::t('app', 'Weight'),
            'weight_en' => Yii::t('app', 'Weight En'),
            'brewing_temperature' => Yii::t('app', 'Brewing Temperature'),
            'brewing_temperature_en' => Yii::t('app', 'Brewing Temperature En'),
            'brewing_time' => Yii::t('app', 'Brewing Time'),
            'brewing_time_en' => Yii::t('app', 'Brewing Time En'),
            'buy_available' => Yii::t('app', 'Buy Available'),
            'link' => Yii::t('app', 'Link'),
            'link_en' => Yii::t('app', 'Link En'),
            'priority' => Yii::t('app', 'Priority'),
        ];
    }

    final public function getTeaCollection(): ActiveQuery
    {
        return $this->hasOne(TeaCollections::class, ['id' => 'tea_collection_id']);
    }

    final public function fields(): array
    {
        return [
            'id',
            'tea_collection_id',
            'title',
            'title_en',
            'subtitle',
            'subtitle_en',
            'description',
            'description_en',
            'background_image' => fn() => UserUrl::toAbsolute($this->background_image),
            'stack_image' => fn() => UserUrl::toAbsolute($this->stack_image),
            'stack_image_en' => fn() => UserUrl::toAbsolute($this->stack_image_en),
            'weight',
            'weight_en',
            'brewing_temperature',
            'brewing_temperature_en',
            'brewing_time',
            'brewing_time_en',
            'buy_available',
            'link',
            'link_en',
            'priority'
        ];
    }
}
