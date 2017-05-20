<?php

namespace backend\models;

use Yii;
use yii\base\Model;


/**
 * Signup form
 */
class ConfigForm extends Model {

    public $percent;

    public function __construct() {
        parent::__construct();
        $this->percent = $this->getPercent()['value'];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['percent', 'trim'],
            ['percent', 'required'],
            ['percent', 'integer']
        ];
    }

    public function setPercent() {
        $sql="REPLACE INTO config (name,value) VALUES (:name,:value)";
        $command=Yii::$app->db->createCommand($sql);
        $command->bindValue(':name', "our percent");
        $command->bindValue(':value', $this->percent);
        $command->execute();
    }

    public function getPercent() {
        $percent = (new \yii\db\Query)
                ->select(['name', 'value'])
                ->from('config')
                ->where(['name' => 'our percent'])
                ->one();
        return $percent;
    }

}
