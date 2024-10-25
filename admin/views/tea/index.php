<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\components\widgets\gridView\ColumnSelect2;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use common\models\TeaCollections;
use kartik\grid\SerialColumn;
use yii\helpers\Url;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\TeaSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Tea
 */

$this->title = Yii::t('app', 'Teas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tea-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <div>
        <?=
            RbacHtml::a(Yii::t('app', 'Create Tea'), ['create'], ['class' => 'btn btn-success']);
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
            ColumnSelect2::widget(['attr' => 'tea_collection_id', 'items' => TeaCollections::findList()]),
            Column::widget(['attr' => 'title']),
            Column::widget(['attr' => 'title_en']),
//            Column::widget(['attr' => 'description', 'format' => 'ntext']),
//            Column::widget(['attr' => 'description_en', 'format' => 'ntext']),
//            Column::widget(['attr' => 'background_image']),
//            Column::widget(['attr' => 'stack_image']),
//            Column::widget(['attr' => 'stack_image_en']),
//            Column::widget(['attr' => 'weight', 'format' => 'ntext']),
//            Column::widget(['attr' => 'weight_en', 'format' => 'ntext']),
//            Column::widget(['attr' => 'brewing_temperature', 'format' => 'ntext']),
//            Column::widget(['attr' => 'brewing_temperature_en', 'format' => 'ntext']),
//            Column::widget(['attr' => 'brewing_time', 'format' => 'ntext']),
//            Column::widget(['attr' => 'brewing_time_en', 'format' => 'ntext']),
//            Column::widget(['attr' => 'buy_available']),
//            Column::widget(['attr' => 'link', 'format' => 'ntext']),
//            Column::widget(['attr' => 'link_en', 'format' => 'ntext']),
//            Column::widget(['attr' => 'priority']),

            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
