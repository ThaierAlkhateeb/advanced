<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

  <?php $form =  ActiveForm::begin(['options' => ['encrypt' => 'multipart/form-data']])?>
  <?= $form->field($model, 'username')->textInput()->hint('Please enter name')->label('username') ?>
  <?= $form->field($model, 'email')->textInput() ?>
  <?= $form->field($model,'pic')->fileInput();?>
    <button>Submit</button>

<?php ActiveForm::end() ?>
</div>
