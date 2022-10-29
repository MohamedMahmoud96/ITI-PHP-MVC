<?php 

namespace MvcPhp\Database;
<<<<<<< HEAD
// use MvcPhp\Database\DB;
=======

>>>>>>> af5c7fe21541bfe995231b3b6bed0f06bfaf1dcc
class Model{

    protected static  $table;

    public static function get(){
        return \DB::selectAll(Model::$table);
    }

<<<<<<< HEAD
    public static function find($col,$value){

        return \DB::selectone(Model::$table,$col,$value);
=======
    public static function find($id){

        return \DB::selectone(Model::$table,$id);
    }

    public static function findone($key ,  $val){

        return \DB::selectsingle(Model::$table,$key , $val);
>>>>>>> af5c7fe21541bfe995231b3b6bed0f06bfaf1dcc
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

<<<<<<< HEAD
    public static function query($query){
       
        return \DB::sql_query($query);
    }

    public static function join($table1,$table1_Col,$table2,$table2_Col){
        return \DB::fjoin($table1,$table1_Col,$table2,$table2_Col);
    }
    
=======

>>>>>>> af5c7fe21541bfe995231b3b6bed0f06bfaf1dcc
}