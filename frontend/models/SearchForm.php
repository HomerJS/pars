<?php
namespace frontend\models;

use yii\base\Model;

/**
 * Signup form
 */
class SearchForm extends Model
{
   public $link;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['link', 'trim'],
            ['link', 'required'],
            ['link', 'string', 'min' => 6, 'max' => 255],

        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
   
        
        return 123;
    }
}
