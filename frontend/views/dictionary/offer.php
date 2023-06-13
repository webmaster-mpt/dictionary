<?php

use frontend\models\Dictionary;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DictionarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Предложения';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="dictionary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Слова', ['show'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('"10 слов"', ['learn'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Переводчик', ['translate'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Назад к админке', ['index'], ['class' => 'btn btn-danger']) ?>
    </p>
    <div class="row mt-2 m-0">
        <?php foreach ($rows as $row) { ?>
            <div class="card border-success" style="max-width: 16rem; width: 100%; margin: 0 15px 15px 0">
                <div class="card-header bg-transparent border-success">
                    <div>
                        <button class="voice-btn border-0" style="background-color: #fff; color: #DAD9E3"><i class="fas fa-volume-up"></i></button>
                        <a href="/dictionary/view?id=<?= $row->id ?>" title="Просмотр" aria-label="Просмотр" data-pjax="0">
                            <svg aria-hidden="true"
                                 style="display:inline-block;color: #DAD9E3;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1.125em"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M573 241C518 136 411 64 288 64S58 136 3 241a32 32 0 000 30c55 105 162 177 285 177s230-72 285-177a32 32 0 000-30zM288 400a144 144 0 11144-144 144 144 0 01-144 144zm0-240a95 95 0 00-25 4 48 48 0 01-67 67 96 96 0 1092-71z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="card-body text-success">
                    <h5 class="card-title m-0"><?= $row->deutch ?></h5>
                </div>
                <div class="card-footer bg-transparent border-success"><?= $row->russian ?></div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    let text = document.querySelectorAll(".card-title");
    let voice = document.querySelectorAll('.voice-btn');
    for (let i = 0; i < voice.length; i++) {
        voice[i].addEventListener('click', () => {
            let speach = new SpeechSynthesisUtterance();
            speach.lang = 'de';
            speach.text = text[i].textContent;
            speechSynthesis.speak(speach);
        });
    }
</script>