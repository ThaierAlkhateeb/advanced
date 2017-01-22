<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = $model->title_en;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $photo= empty($model->pic) ? 'no image' : Yii::getAlias('@upload').'/'.$model->pic;?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title_en',
            'description_en:ntext',
             [
                'attribute'=>'pic',
                'value'=>$photo,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            ],
       
    ]) ?>

</div>
