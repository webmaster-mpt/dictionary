<?php

use yii\base\Component;
use yii\db\ActiveRecord;

Class FastCrud extends Component {
    public static function handleTableForm($parent_model_id, $class, $linkFieldName, $parts): array {
        if (!$class) return $parts;

        $reflectionObject = new \ReflectionClass($class);
        /** @var ActiveRecord $instance */
        $instance = $reflectionObject->newInstanceWithoutConstructor();

        $post = \Yii::$app->request->post();
        if ($post) {
            if (isset($post["delete_$class"])) {
                foreach ($parts as $index => $part) {
                    if ($part->id == $post["delete_$class"]) {
                        $part->delete();
                        unset($parts[$index]);
                    }
                }
            }
            if (isset($post["clear_$class"])) {
                foreach ($parts as $part) {
                    $part->delete();
                }
                $parts = [];
            } else if (isset($post["create_$class"])) {
                $newModel = new $class();
                $newModel->$linkFieldName = $parent_model_id;
                $newModel->save();
                $parts[$newModel->id] = $newModel;
            }

            if ($instance->loadMultiple($parts, $post) && $instance->validateMultiple($parts)) {
                foreach ($parts as $bacSeed) {
                    $bacSeed->save(false);
                }
            }
        }
        return $parts;
    }
}