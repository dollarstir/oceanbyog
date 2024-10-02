<?php

class Settings extends Model
{
    protected  static $table = 'settings';

    public static function appData(){
        $sql = "SELECT * FROM `".self::$table."`";
        return self::customQuery($sql)[0];
    }

}