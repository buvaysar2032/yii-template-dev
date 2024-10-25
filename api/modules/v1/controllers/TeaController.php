<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use common\models\Tea;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Parameter;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use yii\helpers\ArrayHelper;

class TeaController extends AppController
{
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['index']]]);
    }

    /**
     * Returns a list of Text's
     */
    #[Get(
        path: '/tea/index',
        operationId: 'tea-index',
        description: 'Возвращает полный список чай',
        summary: 'Список чай',
        tags: ['tea']
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'tea', type: 'array',
            items: new Items(ref: '#/components/schemas/Tea'),
        )
    ])]

    public function actionIndex(#[Parameter(description: 'ID коллекции чая', in: 'query', schema: new Schema(type: 'string'))] string $collectionId = null): array
    {
        if ($collectionId === null) {
            return $this->returnError('Необходимо передать ID коллекции.');
        }

        $tea = Tea::find()->where(['tea_collection_id' => $collectionId])->all();

        if (empty($tea)) {
            return $this->returnError('Чай не найден для данной коллекции.');
        }

        return $this->returnSuccess($tea, 'tea');
    }
}
