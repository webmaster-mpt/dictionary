<?php

use frontend\models\Dictionary;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dictionary */
/* @var $form yii\widgets\ActiveForm */


$this->title = 'Переводчик';
$this->registerJsFile('../js/translate.js');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<div class="dictionary-form">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col">
            <label>Немецкий</label>
            <label class="fromLang d-none">de</label>
            <button class="voice-btn border-0" style="background-color: none; color: #000000"><i class="fas fa-volume-up"></i></button>
        </div>
        <div class="col toLang-col">
            <label>Русский</label>
            <label class="toLang d-none">ru</label>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" class="form-control fromText txtForVoice" placeholder="Введите текст">
        </div>
        <span class="exchange"><i class="fas fa-exchange-alt"></i></span>
        <div class="col">
            <input type="text" class="form-control toText txtForVoice" placeholder="Перевод">
        </div>
    </div>
    <p>
        <?= Html::a('Слова', ['show'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Предложения', ['offer'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('"10 слов"', ['learn'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Назад к админке', ['index'], ['class' => 'btn btn-danger']) ?>
    </p>

</div>
