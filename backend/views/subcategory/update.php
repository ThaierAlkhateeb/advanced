<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\SubCategory */

$this->title = 'Update Sub Category: ' . $model->title_en;
$this->params['breadcrumbs'][] = ['label' => 'Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sub-category-update">

    <h1><?= Html::encode($this->title) ?></h1>
	<?php
			$categories =  \backend\models\Category::find()->all();
			$catList = ArrayHelper::map($categories,'id','title_en');
	?>
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
  	<?= Html::img($model->pic, ['style'=>'width:122px;']) ?>
    <?= $form->field($model, 'pic')->fileInput() ?>
    <?=$form->field($model,'pic')->hiddenInput(['value'=>$model->pic])->label('') ?>


    <button>Submit</button>

<?php ActiveForm::end() ?>

</div>
