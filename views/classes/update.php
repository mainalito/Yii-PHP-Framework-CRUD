<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Classes $model */

$this->title = 'Update Classes: ' . $model->class_name;
$this->params['breadcrumbs'][] = ['label' => 'Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->class_name, 'url' => ['view', 'class_name' => $model->class_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
