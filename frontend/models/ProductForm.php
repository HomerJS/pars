<?php

namespace frontend\models;

use yii\base\Model;

/**
 * Signup form
 */
class ProductForm extends Model {

    public $link;
    public $price_value;
    public $price_name;

    public function setInfo($array) {
        $this->price_value = $array['price_value'];
        $this->price_name = $array['price_name'];
        $this->link = $array['SearchForm']['link'];
        $this->save();
    }

    public function save() {
        $sql = "INSERT INTO product (url,price_value,price_name) VALUES (:url,:value,:name)";
        $command = \Yii::$app->db->createCommand($sql);
        $command->bindValue(':url', $this->link);
        $command->bindValue(':value', $this->price_value);
        $command->bindValue(':name', $this->price_name);

        $command->execute();
    }
    
      public function getAll() {
            $array = (new \yii\db\Query)
                ->select(['id','url','price_name', 'price_value'])
                ->from('product')
                ->all();
        return $array;
    }

}
