<?php
namespace main\core\database;

use main\core\Main;
use main\core\model\Model;
use main\core\Test;

abstract class DbsModel extends Model
{
    public int $primaryKey;
    

    public function __construct()
    {
        
    }

   
    abstract public function tableName(): array;

    public function save(array $tableNames,  $match)
    {
        $tableDatas = $this->tableName();
        $id = 0;
        foreach($tableNames as $name){
            
            if($tableDatas[$name][$match]){
                $tableDatas[$name][$match] = $id;
            }
            $id = $this->insert($name,  $tableDatas[$name]);  
        }
    }

    protected function insert($tableName,  array $data)
    {
        $attributes = array_keys($data);
        // echo $tableName;

        // Test::show($data);

        $params = array_map(fn($attr)=> ":$attr", $attributes);
        $sql = "INSERT INTO $tableName (". implode(',', $attributes).") VALUES (". implode(',', $params). ")" ;
        $statement = $this->prepare($sql);
        foreach($attributes as $attr ){
            //  echo $data[$attr]. PHP_EOL;
                $statement->bindValue(":$attr", $data[$attr]);
            }
            // Test::show(($statement->execute()));
            return Main::$main->db->getId($statement);
            
    }

  

    public function findOne($where) 
    {
        $tableName = static::tableName();

        $attributes = array_keys($where);
        
        $sql = "SELECT * FROM $tableName WHERE ". implode("AND", array_map(fn($attr)=> "$attr = :$attr", $attributes));
        $statement = self::prepare($sql);
        foreach($where as $attr => $value){
            $statement->bindValue(":$attr", $value);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public  function prepare($sql)
    {
        
        return Main::$main->db->prepare($sql);
    }



    public function getWhere($table= false,$where = false) 
    {

        $tableName = $table ? $table : static::$table;
        $sql = $where ? "WHERE id = ?" : "" ;
        
         $sql = "SELECT * FROM $tableName $sql ORDER BY 'create_at' ASC";
        $statement = self::prepare($sql);
        $statement->execute([$where]);
        
        return $statement->fetchAll();
    }

    


    public function fetchOne()
    {
        $tableName = static::tableName();
       

        $sql = "SELECT * FROM $tableName ORDER BY 'id' DESC LIMIT 1";
        $statement = self::prepare($sql);
        $statement->execute();
        return $statement->fetch();


    }

    public function delete($where)
    {
        // return $valueId;
        $tableName = $this->tableName();
        foreach($where as $key => $value){
            $id = $key;
            $valueId = $value;
        }
        
        $sql = "DELETE FROM $tableName  WHERE  $id = :$id ";
        $statement = self::prepare($sql);
        $statement->bindValue(":$id", $valueId);
        $statement->execute();

    }

    public function destroy($table, array $where)
    {
        $tableName = $table; 
        $id = $where[0];
        $valueId = $where[1];
        $sql = "DELETE FROM $tableName  WHERE  $id = :$id ";
        $statement = self::prepare($sql);
        $statement->bindValue(":$id", $valueId);
        $statement->execute();
    }




}