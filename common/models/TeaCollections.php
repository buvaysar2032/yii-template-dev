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
 * This is the model class for table "{{%tea_collections}}".
 *
 * @property int              $id
 * @property string           $title
 * @property string           $title_en
 * @property string|null      $subtitle
 * @property string|null      $subtitle_en
 * @property string|null      $color
 * @property string|null      $image
 *
 * @property-read Tea[]       $teas
 */

#[Schema(properties: [
    new Property(property: 'id', type: 'int'),
    new Property(property: 'title', type: 'string'),
    new Property(property: 'title_en', type: 'string'),
    new Property(property: 'subtitle', type: 'string'),
    new Property(property: 'subtitle_en', type: 'string'),
    new Property(property: 'color', type: 'string'),
    new Property(property: 'image', type: 'string'),
])]

class TeaCollections extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%tea_collections}}';
    }

    public static function findList(): array
    {
        return self::find()->select(['title', 'id'])->indexBy('id')->column();
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'title_en'], 'required'],
            [['subtitle', 'subtitle_en'], 'string'],
            [['title', 'title_en', 'color', 'image'], 'string', 'max' => 255]
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
            'subtitle' => Yii::t('app', 'Subtitle'),
            'subtitle_en' => Yii::t('app', 'Subtitle En'),
            'color' => Yii::t('app', 'Color'),
            'image' => Yii::t('app', 'Image'),
        ];
    }

    final public function getTeas(): ActiveQuery
    {
        return $this->hasMany(Tea::class, ['tea_collection_id' => 'id']);
    }

    final public function fields(): array
    {
        return ['id', 'title', 'title_en', 'subtitle', 'subtitle_en',  'color', 'image' => fn() => UserUrl::toAbsolute($this->image)];
    }
}
