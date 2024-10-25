<?php

use common\components\helpers\UserUrl;
use common\models\TeaSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Tea
 */

$this->title = Yii::t('app', 'Update Tea: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Teas'),
    'url' => UserUrl::setFilters(TeaSearch::class)
];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tea-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => false]) ?>

</div>
