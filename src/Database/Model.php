<?php 

namespace MvcPhp\Database;

class Model{

    protected static  $table;

    public static function get(){
        return \DB::selectAll(Model::$table);
    }

    public static function find($id){

        return \DB::selectone(Model::$table,$id);
    }

    public static function create($arr_data){
       
        return \DB::insert(Model::$table,$arr_data);
    }

    public static function update($arr_data,$id){
       
        return \DB::update_item(Model::$table,$arr_data,$id);
    }

    public static function destory($colName,$id){
       
        return \DB::delete(Model::$table,$colName,$id);
    }


}