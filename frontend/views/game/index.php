<?php

/** @var yii\web\View $this */

$this->title = 'Словарь';
$this->registerCssFile('../css/game.css');
$this->registerJsFile('../js/game.js');
?>
<div class="site-index">

    <div class="row">
        <h1>Игра слов</h1>
        <h3>Задача: перевести все слова</h3>
        <?php foreach ($items as $key => $row) { ?>
            <div class="card card-<?= $key ?> border-success myCards" style="max-width: 16rem; width: 100%; margin: 0 15px 15px 0;">
                <div class="card-header bg-transparent border-success">
                    <?= $row->russian ?>
                </div>
                <div class="card-body text-success de-body">
                    <h5 class="card-title d-none trans_de" id="<?= $row->id ?>"><?= $row->deutch ?></h5>
                    <input type="text" class="inp_de" id="<?= $row->id ?>" name="lang_de" placeholder="Deutsch">
                </div>
            </div>
        <?php } ?>
    </div>

</div>
