<?php

use frontend\models\Dictionary;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DictionarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model Dictionary */
/* @var $rows Dictionary */

$this->title = 'Слова';
$this->registerJsFile('../js/show.js');
$this->registerJsFile('../js/learn.js');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="dictionary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Предложения', ['offer'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('"10 слов"', ['learn'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Переводчик', ['translate'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Назад к админке', ['index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::dropDownList(null,['text' => 'Режим:'], [
            '0' => 'Обычный',
            '1' => 'Учить немецкий',
            '2' => 'Проверка',
        ], ['class' => 'form-control mode', 'style' => 'width: 17%; display: inline-block;vertical-align: -2px;']
        ) ?>
    </p>
    <div class="row mt-2 m-0">
        <?php foreach ($rows as $key => $row) { ?>
            <div class="card border-success myCards" style="max-width: 16rem; width: 100%; margin: 0 15px 15px 0">
                <div class="card-header bg-transparent border-success">
                    <?= $row->russian ?>
                    <div class="float-right">
                        <button class="voice-btn border-0" style="background-color: #fff; color: #DAD9E3"><i class="fas fa-volume-up"></i></button>
                        <button class="my-hider border-0" style="background-color: #fff; color: #DAD9E3">
                            <svg aria-hidden="true"
                                 style="display:inline-block;color: #DAD9E3;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1.125em"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M573 241C518 136 411 64 288 64S58 136 3 241a32 32 0 000 30c55 105 162 177 285 177s230-72 285-177a32 32 0 000-30zM288 400a144 144 0 11144-144 144 144 0 01-144 144zm0-240a95 95 0 00-25 4 48 48 0 01-67 67 96 96 0 1092-71z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="card-body text-success">
                    <h5 class="card-title m-0"><?= $row->deutch ?></h5>
                </div>
                <div class="card-footer bg-transparent border-success">[ <?= $row->transcription ?> ]</div>
            </div>
        <?php } ?>
    </div>
</div>
