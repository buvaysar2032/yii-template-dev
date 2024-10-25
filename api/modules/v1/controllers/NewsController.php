<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use common\enums\NewsStatus;
use common\models\News;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Property;
use yii\helpers\ArrayHelper;

class NewsController extends AppController
{
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['index']]]);
    }

    /**
     * Returns a list of Text's
     */
    #[Get(
        path: '/news/index',
        operationId: 'news-index',
        description: 'Возвращает полный список новостей',
        summary: 'Список новостей',
        tags: ['news']
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'news', type: 'array',
            items: new Items(ref: '#/components/schemas/News'),
        )
    ])]

    public function actionIndex(): array
    {
        $news = News::find()->where(['status' => NewsStatus::PUBLISHED_YES->value])->orderBy(['priority' => SORT_ASC])->all();

        return $this->returnSuccess($news, 'news');
    }
}
