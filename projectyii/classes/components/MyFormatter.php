<?php

namespace app\classes\components;

use yii\i18n\Formatter;

class MyFormatter extends Formatter
{
    public static function asCep($string)
    {
        return substr($string, 0, 5).'-'. substr($string,5);
    }

    public static function asCpf($string)
    {
        return substr($string, 0, 3).'.'. substr($string,3,3).'.'.substr($string,6,3).'-'.substr($string,9);

    }   
     public static function asCnpj($string)
    {
        return substr($string, 0, 2).'.'. substr($string,2,3).'.'.substr($string,5,3).'-'.substr($string,4);

    }
}

?>