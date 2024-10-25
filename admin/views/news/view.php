<?php

use admin\components\widgets\detailView\Column;
use admin\modules\rbac\components\RbacHtml;
use common\components\helpers\UserUrl;
use common\enums\NewsStatus;
use common\models\NewsSearch;
use yii\widgets\DetailView;

/**
 * @var $this  yii\web\View
 * @var $model common\models\News
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'News'),
    'url' => UserUrl::setFilters(NewsSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

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
            Column::widget(['attr' => 'title']),
            Column::widget(['attr' => 'title_en']),
            Column::widget(['attr' => 'priority']),
            Column::widget(['attr' => 'date', 'format' => 'date']),
            Column::widget(['attr' => 'description', 'format' => 'ntext']),
            Column::widget(['attr' => 'description_en', 'format' => 'ntext']),
            Column::widget(['attr' => 'text', 'format' => 'html']),
            Column::widget(['attr' => 'text_en', 'format' => 'html']),
            Column::widget(['attr' => 'image']),
            Column::widget(['attr' => 'status', 'items' => NewsStatus::class]),
        ]
    ]) ?>

</div>
