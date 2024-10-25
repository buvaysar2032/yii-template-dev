<?php

use admin\widgets\ckeditor\EditorClassic;
use admin\widgets\ckfinder\CKFinderInputFile;
use admin\widgets\input\Select2;
use common\models\TeaCollections;
use common\widgets\AppActiveForm;
use kartik\icons\Icon;
use vova07\imperavi\Widget;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * @var $this     yii\web\View
 * @var $model    common\models\Tea
 * @var $form     AppActiveForm
 * @var $isCreate bool
 */
?>

<div class="tea-form">

    <?php $form = AppActiveForm::begin() ?>

    <?= $form->field($model, 'tea_collection_id')->widget(Select2::class, ['data' => TeaCollections::findList()]) ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'subtitle_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'description')->widget(EditorClassic::class) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'description_en')->widget(EditorClassic::class) ?>
        </div>
    </div>

    <?= $form->field($model, 'background_image')->widget(CKFinderInputFile::class) ?>

    <?= $form->field($model, 'stack_image')->widget(CKFinderInputFile::class) ?>

    <?= $form->field($model, 'stack_image_en')->widget(CKFinderInputFile::class) ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'weight_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'brewing_temperature')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'brewing_temperature_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'brewing_time')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'brewing_time_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'buy_available')->checkbox() ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'link_en')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


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
