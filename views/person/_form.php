<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/** @var yii\web\View $this */
/** @var app\models\Person $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="person-form">

<?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->widget(FileInput::class, [
                // 'options' => ['multiple' => true],
                'pluginOptions' => [
                    // 'initialPreview' => $model->getPhotoViewer(),
                    'initialPreviewAsData' => true,
                    'showUpload' => true,
                    'allowedFileExtensions' => ['jpg', 'jpeg', 'png', 'gif'],
                    // 'maxFileSize' => 1024,
                ],
            ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
