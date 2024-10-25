<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\components\widgets\gridView\ColumnImage;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\TeaCollectionsSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\TeaCollections
 */

$this->title = Yii::t('app', 'Tea Collections');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tea-collections-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <div>
        <?=
            RbacHtml::a(Yii::t('app', 'Create Tea Collections'), ['create'], ['class' => 'btn btn-success']);
//           $this->render('_create_modal', ['model' => $model]);
        ?>
    </div>

    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
            Column::widget(['attr' => 'title']),
            Column::widget(['attr' => 'title_en']),
            Column::widget(['attr' => 'subtitle', 'format' => 'ntext']),
            Column::widget(['attr' => 'subtitle_en', 'format' => 'ntext']),
            Column::widget(['attr' => 'color', 'format' => 'color', 'editable' => false]),
            ColumnImage::widget(['attr' => 'image']),


            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
