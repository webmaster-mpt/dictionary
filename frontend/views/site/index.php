<?php

/** @var yii\web\View $this */

$this->title = 'Словарь';
?>
<div class="site-index">
    <?php  return $this->render('show', [
        'model' => $model,
        'rows' => $rows
    ]); ?>
</div>
