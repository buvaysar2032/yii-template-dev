<?php

use admin\components\widgets\detailView\Column;
use admin\modules\rbac\components\RbacHtml;
use common\components\helpers\UserUrl;
use common\models\TeaSearch;
use yii\widgets\DetailView;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Tea
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Teas'),
    'url' => UserUrl::setFilters(TeaSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tea-view">

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
            Column::widget(['attr' => 'tea_collection_id']),
            Column::widget(['attr' => 'title']),
            Column::widget(['attr' => 'title_en']),
            Column::widget(['attr' => 'subtitle', 'format' => 'ntext']),
            Column::widget(['attr' => 'subtitle_en', 'format' => 'ntext']),
            Column::widget(['attr' => 'description', 'format' => 'ntext']),
            Column::widget(['attr' => 'description_en', 'format' => 'ntext']),
            Column::widget(['attr' => 'background_image']),
            Column::widget(['attr' => 'stack_image']),
            Column::widget(['attr' => 'stack_image_en']),
            Column::widget(['attr' => 'weight', 'format' => 'ntext']),
            Column::widget(['attr' => 'weight_en', 'format' => 'ntext']),
            Column::widget(['attr' => 'brewing_temperature', 'format' => 'ntext']),
            Column::widget(['attr' => 'brewing_temperature_en', 'format' => 'ntext']),
            Column::widget(['attr' => 'brewing_time', 'format' => 'ntext']),
            Column::widget(['attr' => 'brewing_time_en', 'format' => 'ntext']),
            Column::widget(['attr' => 'buy_available']),
            Column::widget(['attr' => 'link', 'format' => 'ntext']),
            Column::widget(['attr' => 'link_en', 'format' => 'ntext']),
            Column::widget(['attr' => 'priority']),
        ]
    ]) ?>

</div>
