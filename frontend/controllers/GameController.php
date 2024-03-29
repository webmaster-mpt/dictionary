<?php

namespace frontend\controllers;

use frontend\components\FastCrud;
use frontend\models\Dictionary;
use frontend\models\DictionarySearch;
use JsonException;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\JsonResponseFormatter;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * DictionaryController implements the CRUD actions for Dictionary model.
 */
class GameController extends Controller
{
    public function beforeAction($action)
    {
        if ($action->id = 'get-word') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $items = Dictionary::find()->where(['type' => 'game'])->orderBy(new Expression('rand()'))->limit(20)->all();
        return $this->render('index',[
            'items' => $items
        ]);
    }
}
