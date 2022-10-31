<?php

class DB
{

    static private $conn;
    private function __construct($database_type, $host, $database_name, $username, $password)
    {

        $db = "$database_type:host=$host;dbname=$database_name";
        DB::$conn = new PDO($db, $username, $password);
    }
    static function connect($database_type, $host, $database_name, $username, $password)
    {
        if (!isset(DB::$conn)) {
            new DB($database_type, $host, $database_name, $username, $password);
        }
        return DB::$conn;
    }
    //   =====================================
    public static function selectAll($table)
    {

        return DB::$conn->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
    }
    //   =====================================
    public static function selectone($table, $id)
    {

        return DB::$conn->query("SELECT * FROM $table WHERE  id=$id")->fetch(PDO::FETCH_ASSOC);
    }
    //   =====================================
    public static function insert($table, $array)
    {

        $fields = array_keys($array);
        $values = array_values($array);
        $fieldlist = implode(',', $fields);
        $qs = str_repeat("?,", count($fields) - 1);

        $sql = "INSERT INTO `" . $table . "` (" . $fieldlist . ") VALUES (${qs}?)";

        $q = DB::$conn->prepare($sql);
        return $q->execute($values);
    }
    //   =====================================
    public static function update_item($table, $array, $id)
    {

        $update = 'SET ';
        $fields = array_keys($array);
        $values = array_values($array);
        foreach ($fields as $field) {
            $update .= $field . '=?,';
        }
        $update = substr($update, 0, -1);
        $sql = "update $table ${update} where id=$id";
        $q = DB::$conn->prepare($sql);
        return  $q->execute($values);
    }
    //   =====================================
    public static function delete($table, $key, $value)
    {

        $sql = "DELETE  FROM $table  WHERE $key=$value";
        $q = DB::$conn->prepare($sql);
        return $q->execute();
    }
    //   =====================================


    public static function selectsingle($table, $key, $val)
    {

        return DB::$conn->query("SELECT * FROM $table WHERE $key='$val'")->fetch(PDO::FETCH_ASSOC);
    }

    public  static function selectAllBaseBydKey($table, $key, $val)
    {
        return DB::$conn->query("SELECT * FROM $table WHERE $key='$val'")->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function sql_query($query)
    {
        return DB::$conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}


DB::connect(
    env("DB_type"),
    env("Host"),
    env("DB_name"),
    env("user_name"),
    env("password")
);
