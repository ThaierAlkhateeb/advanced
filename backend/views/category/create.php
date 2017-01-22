<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = 'Create Category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>

   
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
 <?= $form->field($model, 'title_en')->textInput()->hint('Please enter the title')->label('Title') ?>
 <?= $form->field($model, 'description_en')->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'es',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
  ]);?>
    <?= $form->field($model, 'pic')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>
</div>
