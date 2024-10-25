<?php

namespace api\modules\v1\controllers;

use common\models\TeaCollections;
use OpenApi\Attributes\{Get, Items, Property};
use api\behaviors\returnStatusBehavior\JsonSuccess;
use yii\helpers\ArrayHelper;

class CollectionController extends AppController
{
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['index']]]);
    }

    /**
     * Returns a list of Text's
     */
    #[Get(
        path: '/collection/index',
        operationId: 'collection-index',
        description: 'Возвращает полный список коллекции',
        summary: 'Список коллекции',
        tags: ['collection']
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'collections', type: 'array',
            items: new Items(ref: '#/components/schemas/TeaCollections'),
        )
    ])]
    public function actionIndex(): array
    {
        $collections = TeaCollections::find()->all();
        return $this->returnSuccess($collections, 'collections');
    }
}
