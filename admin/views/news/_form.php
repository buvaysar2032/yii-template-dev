<?php

use admin\widgets\ckeditor\EditorClassic;
use admin\widgets\ckfinder\CKFinderInputFile;
use admin\widgets\input\DatePicker;
use admin\widgets\input\Select2;
use common\enums\NewsStatus;
use common\modules\user\enums\Status;
use common\widgets\AppActiveForm;
use kartik\icons\Icon;
use yii\bootstrap5\Html;
use yii\helpers\Url;

/**
 * @var $this     yii\web\View
 * @var $model    common\models\News
 * @var $form     AppActiveForm
 * @var $isCreate bool
 */
?>

<div class="news-form">

    <?php $form = AppActiveForm::begin() ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'date')->widget(DatePicker::class) ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'description_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'text')->widget(EditorClassic::class) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'text_en')->widget(EditorClassic::class) ?>
        </div>
    </div>

    <?= $form->field($model, 'image')->widget(CKFinderInputFile::class) ?>

    <?= $form->field($model, 'status')->widget(Select2::class, ['data' => NewsStatus::indexedDescriptions()]) ?>

    <div class="form-group">
        <?php if ($isCreate) {
            echo Html::submitButton(
                Icon::show('save') . Yii::t('app', 'Save And Create New'),
                ['class' => 'btn btn-success', 'formaction' => Url::to() . '?redirect=create']
            );
            echo Html::submitButton(
                Icon::show('save') . Yii::t('app', 'Save And Return To List'),
                ['class' => 'btn btn-success', 'formaction' => Url::to() . '?redirect=index']
            );
        } ?>
        <?= Html::submitButton(Icon::show('save') . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php AppActiveForm::end() ?>

</div>
