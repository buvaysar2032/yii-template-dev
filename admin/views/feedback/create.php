<?php

use common\components\helpers\UserUrl;
use common\models\FeedbackSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Feedback
 */

$this->title = Yii::t('app', 'Create Feedback');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Feedbacks'),
    'url' => UserUrl::setFilters(FeedbackSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
