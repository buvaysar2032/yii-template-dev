<?php

use admin\widgets\ckfinder\CKFinderInputFile;
use common\widgets\AppActiveForm;
use kartik\color\ColorInput;
use kartik\icons\Icon;
use yii\bootstrap5\Html;
use yii\helpers\Url;

/**
 * @var $this     yii\web\View
 * @var $model    common\models\TeaCollections
 * @var $form     AppActiveForm
 * @var $isCreate bool
 */
?>

<div class="tea-collections-form">

    <?php $form = AppActiveForm::begin() ?>

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

    <?= $form->field($model, 'color')->widget(ColorInput::class, [
        'options' => ['placeholder' => 'Select color ...'],
    ]) ?>

    <?= $form->field($model, 'image')->widget(CKFinderInputFile::class) ?>

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
