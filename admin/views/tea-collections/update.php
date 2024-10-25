<?php

use common\components\helpers\UserUrl;
use common\models\TeaCollectionsSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\TeaCollections
 */

$this->title = Yii::t('app', 'Update Tea Collections: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Tea Collections'),
    'url' => UserUrl::setFilters(TeaCollectionsSearch::class)
];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tea-collections-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => false]) ?>

</div>
