<?php

use frontend\models\Dictionary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DictionarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Учить слова';
$this->registerJsFile('../js/show.js');
$this->registerJsFile('../js/learn.js');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="dictionary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Предложения', ['offer'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Слова', ['show'], ['class' => 'btn btn-primary']) ?>
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
            <div class="card card-<?= $key ?> border-success myCards" style="max-width: 16rem; width: 100%; margin: 0 15px 15px 0">
                <div class="card-header bg-transparent border-success">
                    <?= $row->russian ?>
                    <div class="float-right">
                        <button class="voice-btn border-0" style="padding: 0;background-color: #fff; color: #DAD9E3"><i
                                    class="fas fa-volume-up"></i></button>
                        <a href="/dictionary/change-type?id=<?= $row->id ?>" class="check">
                            <i class="fas fa-check" style="background-color: #fff; color: #DAD9E3"></i>
                        </a>
                        <a href="/dictionary/update?id=<?= $row->id ?>" title="Редактировать" aria-label="Редактировать"
                           data-pjax="0">
                            <svg aria-hidden="true"
                                 style="display:inline-block;color: #DAD9E3;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z">
                                </path>
                            </svg>
                        </a>
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