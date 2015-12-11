<?php
namespace App\Custom\Helpers;

use App\User;
use App\Role;
use App\Status;

class DatabaseHelper{
    private static $path = 'App\\';
    
    public static function getStatusId($name){
       $status = Status::where('name', $name)->first();
       
       return empty($status) ? 0 : $status->id;
    }
    
    public static function getRoleId($name){
       $role = Role::where('name', $name)->first();
       return empty($role) ? 0 : $role->id;
    }
    
    
    
    public static function getTableTotal($class){
        $class = self::$path . $class;
        return $class::all()->count();
    }
    
    public static function getTableList($class, array $map, array $except = array()){
        $class = self::$path . $class;
        $list = array();
        if(empty($except)){            
            $list = $class::all()->toArray();
        } else {
            $list = $class::whereNotIn('name', $except)->toArray();
        }
        $result = array();
        $k = $map['key'];
        $v = $map['value'];
        foreach($list as $item){
            $key = $item[$k];
            $value = $item[$v];
            $result[$key] = $value;
        }
        return $result;
    }
}

