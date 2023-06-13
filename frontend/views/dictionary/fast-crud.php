<?php

use frontend\models\Dictionary;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dictionary */
/* @var $form yii\widgets\ActiveForm */


$this->title = 'Быстрый CRUD';
$this->registerJsFile('../js/translate.js');
?>
<div class="dictionary-form">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Слова', ['show'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Предложения', ['offer'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('"10 слов"', ['learn'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Переводчик', ['translate'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Назад к админке', ['index'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php $form = \yii\widgets\ActiveForm::begin([
        'options' => [
            'data' => ['pjax' => true],
            'method' => 'post',
        ],
    ]); ?>

    <table class="table table-sm table-bordered">
        <thead>
        <tr>
            <th>Немецкий</th>
            <th>Русский</th>
            <th>Транскрипция</th>
            <th>Тип</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($dictParts as $id => $dictPart) { ?>
            <tr>
                <td>
                    <?= $form->field($dictPart, "[$id]deutch")->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($dictPart, "[$id]russian")->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($dictPart, "[$id]transcription")->textInput(['maxlength' => true])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($dictPart, "[$id]type")->dropDownList(['wort' => 'wort', 'bieten' => 'bieten', 'learn' => 'learn'])->label(false) ?>
                </td>
                <?= $form->field($dictPart, "[$id]uniq_id")->hiddenInput()->label(false) ?>
                <td>
                    <button type="submit" name='delete_<?= Dictionary::class ?>' value='<?php echo $dictPart->id ?>'
                            class="btn btn-danger btn-block">
                        X
                    </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'btnDictionary', 'value' => 'dictionary']) ?>
    <button type="submit" name='create_<?= Dictionary::class ?>' value=1 class="btn btn btn-success">
        Добавить
    </button>
    <button type="submit" name='clear_<?= Dictionary::class ?>' value='1' class="btn btn-danger"
            data-confirm="Вы уверены что хотите очистить таблицу?">
        Очистить
    </button>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
</div>