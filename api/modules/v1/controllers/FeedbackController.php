<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use api\behaviors\returnStatusBehavior\RequestFormData;
use common\models\Feedback;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use Yii;
use yii\helpers\ArrayHelper;

class FeedbackController extends AppController
{
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['create']]]);
    }

    /**
     * Returns a list of Text's
     */
    #[Post(
        path: '/feedback/create',
        operationId: 'feedback-create',
        description: '',
        summary: 'Обратная связь',
        tags: ['feedback']
    )]
    #[RequestFormData(properties: [
        new Property(property: 'name', type: 'string'),
        new Property(property: 'email', type: 'string'),
        new Property(property: 'message', type: 'string'),
    ])]
    #[JsonSuccess(content: [
        new Property(property: 'message', type: 'string', example: 'Сообщение отправлено успешно.')
    ])]
    public function actionCreate(): array
    {
        $request = Yii::$app->request->post();

        if (empty($request['name']) || empty($request['email']) || empty($request['message'])) {
            return $this->returnError('Все поля обязательны для заполнения.');
        }

        $feedback = new Feedback();
        $feedback->name = $request['name'];
        $feedback->email = $request['email'];
        $feedback->message = $request['message'];

        if (!$feedback->save()) {
            return $this->returnError('Не удалось сохранить сообщение.', $feedback->getErrors());
        }

        return $this->returnSuccess(['message' => 'Сообщение отправлено успешно.']);
    }
}
