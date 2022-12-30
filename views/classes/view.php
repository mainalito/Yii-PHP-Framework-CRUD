<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Classes $model */

$this->title = $model->class_name;
$this->params['breadcrumbs'][] = ['label' => 'Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="classes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'class_name' => $model->class_name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'class_name' => $model->class_name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'class_name',
        ],
    ]) ?>

</div>
