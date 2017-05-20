<?php

namespace frontend\models;

use yii\base\Model;

/**
 * Signup form
 */
class SearchForm extends Model {

    public $link;
    public $price;
    public $val;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['link', 'trim'],
            ['link', 'required'],
            ['link', 'string', 'min' => 6, 'max' => 500],
        ];
    }

    public function getSite() {
        $site = '';

        if (strpos($this->link, 'amazon.com') !== FALSE)
            $site = 'amazon';
        if (strpos($this->link, 'ebay.com') !== FALSE)
            $site = 'ebay';
        if (strpos($this->link, 'taobao.com') !== FALSE)
            $site = 'taobao';
        if (strpos($this->link, 'aliexpress.com') !== FALSE)
            $site = 'ali';
        if ($site != '') {
            $file = $this->getFile();
            $method = 'pars' . $site;
            $temp = $this->$method($file);
            $this->price=$temp['price'];
            $this->val=$temp['val'];
        }
       
    }

    protected function getFile() {
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Accept-language: en\r\n" .
                "Cookie: foo=bar\r\n"
            )
        );

        $context = stream_context_create($opts);

        return file_get_contents($this->link, false, $context);
    }

    protected function parsAmazon($file) {
        preg_match_all('/<span id="priceblock_ourprice" class="a-size-medium a-color-price">(.+?)<\/span>/', $file, $str);
        if ($str)
            return ['price'=>substr($str[1][0], 1),'val'=>'USD'];

        return false;
    }
     
     protected function parsEbay($file) {
        preg_match_all('/<span class="notranslate" id="prcIsum" itemprop="price"  style="" content="(.+?)">US/', $file, $str);
        if ($str)
           return ['price'=>$str[1][0],'val'=>'USD'];

        return false;
    }
    
     protected function parsTaobao($file) {
        preg_match_all('/<meta property="product:price:amount" content="(.+?)" \/>/', $file, $str);
        if ($str)
            return ['price'=>$str[1][0],'val'=>'CNY'];

        return false;
    }
    
     protected function parsAli($file) {
        preg_match_all('/<span id="j-sku-discount-price" class="p-price" itemprop="price">(.+?)<\/span>/', $file, $str);
        if ($str)
             return ['price'=>$str[1][0],'val'=>'USD'];

        return false;
    }

}
