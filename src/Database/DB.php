<?php

class DB{

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
public static function sql_query($query){

    // $q = DB::$conn->prepare($query);
    // return $q->execute($values);
    return DB::$conn->query($query);
}



// ===========================================
public static function selectAll($table){

    return DB::$conn->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);

}
//   =====================================
public static function selectone($table,$col,$value){

    return DB::$conn->query("SELECT * FROM $table WHERE  $col=$value")->fetch(PDO::FETCH_ASSOC);

 }
//   =====================================
public static function insert($table,$array){
  
    $fields=array_keys($array);
    $values=array_values($array);
    $fieldlist=implode(',', $fields); 
    $qs=str_repeat("?,",count($fields)-1);

    $sql="INSERT INTO `".$table."` (".$fieldlist.") VALUES (${qs}?)";

    $q = DB::$conn->prepare($sql);
    return $q->execute($values);
 }
//   =====================================
public static function update_item($table,$array,$id){

    $update = 'SET ';
    $fields = array_keys($array);
    $values = array_values($array);
    foreach ($fields as $field) {
        $update .= $field . '=?,';
    }
    $update = substr($update, 0, -1);
   $sql= "update $table ${update} where id=$id";
    $q= DB::$conn->prepare($sql);
    return  $q->execute($values);

 }
//   =====================================
public static function delete($table,$key,$value){

    $sql="DELETE  FROM $table  WHERE $key=$value";
    $q = DB::$conn->prepare($sql);
    return $q->execute();

 }
//   =====================================
public static function fjoin($sql,$table1,$table1_Col,$table2,$table2_Col){

    $sql="SELECT
                $sql
            FROM $table1
            JOIN $table2
            ON
                $table1.$table1_Col =$table2.$table2_Col";
                
    return DB::$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  
}
}//end class

DB::connect(
            env("DB_type"),
            env("Host"),
            env("DB_name"),
            env("user_name"),
            env("password")
);
