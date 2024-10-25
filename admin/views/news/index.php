<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\helpers\Url;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\NewsSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\News
 */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <div>
        <?=
            RbacHtml::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success']);
//           $this->render('_create_modal', ['model' => $model]);
        ?>
    </div>

    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'sortUrl' => Url::toRoute(['sort']),
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
            Column::widget(['attr' => 'title']),
            Column::widget(['attr' => 'title_en']),
            //Column::widget(['attr' => 'priority']),
            Column::widget(['attr' => 'date']),
//            Column::widget(['attr' => 'description', 'format' => 'ntext']),
//            Column::widget(['attr' => 'description_en', 'format' => 'ntext']),
//            Column::widget(['attr' => 'text', 'format' => 'ntext']),
//            Column::widget(['attr' => 'text_en', 'format' => 'ntext']),
//            Column::widget(['attr' => 'image']),
//            Column::widget(['attr' => 'status']),

            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
