<?php

use admin\components\widgets\detailView\Column;
use admin\modules\rbac\components\RbacHtml;
use common\components\helpers\UserUrl;
use common\enums\FeedbackStatus;
use common\models\FeedbackSearch;
use yii\widgets\DetailView;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Feedback
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Feedbacks'),
    'url' => UserUrl::setFilters(FeedbackSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <p>
        <?= RbacHtml::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= RbacHtml::a(
            Yii::t('app', 'Delete'),
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post'
                ]
            ]
        ) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            Column::widget(),
            Column::widget(['attr' => 'name']),
            Column::widget(['attr' => 'email', 'format' => 'email']),
            Column::widget(['attr' => 'message', 'format' => 'ntext']),
            Column::widget(['attr' => 'created_at', 'format' => 'datetime']),
            Column::widget(['attr' => 'updated_at', 'format' => 'datetime']),
            Column::widget(['attr' => 'moderation_status', 'items' => FeedbackStatus::class]),
            Column::widget(['attr' => 'comment']),
        ]
    ]) ?>

</div>
