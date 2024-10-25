<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\components\widgets\gridView\ColumnDate;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\FeedbackSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Feedback
 */

$this->title = Yii::t('app', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
            Column::widget(['attr' => 'name']),
            Column::widget(['attr' => 'email', 'format' => 'email']),
            Column::widget(['attr' => 'message', 'format' => 'ntext']),
            ColumnDate::widget(['attr' => 'created_at', 'searchModel' => $searchModel, 'editable' => false]),
            ColumnDate::widget(['attr' => 'updated_at', 'searchModel' => $searchModel, 'editable' => false]),
            Column::widget(['attr' => 'moderation_status']),
            Column::widget(['attr' => 'comment']),

            ['class' => GroupedActionColumn::class, 'template' => '{update}']
        ]
    ]) ?>
</div>
