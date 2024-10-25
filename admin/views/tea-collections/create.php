<?php

use common\components\helpers\UserUrl;
use common\models\TeaCollectionsSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\TeaCollections
 */

$this->title = Yii::t('app', 'Create Tea Collections');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Tea Collections'),
    'url' => UserUrl::setFilters(TeaCollectionsSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tea-collections-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
