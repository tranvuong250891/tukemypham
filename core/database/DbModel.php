<?php
namespace main\core\database;

use main\core\Main;
use main\core\model\Model;
use main\core\Test;

abstract class DbModel extends Model
{
    public int $primaryKey;
    public array $tableMatch = [];

    public function __construct()
    {
        
    }

    abstract public function attributes():array;
    abstract public function tableName(): string;
    abstract public function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        
        $params = array_map(fn($attr)=> ":$attr", $attributes);
        
        $sql = "INSERT INTO $tableName (". implode(',', $attributes).") VALUES (". implode(',', $params). ")" ;
        
        $statement = $this->prepare($sql);

        foreach($attributes as $attr ){
            
            $statement->bindValue(":$attr", $this->{$attr});
        }

        return Main::$main->db->getId($statement);
        
        
    }

    public function update($id, $key = null,array $attributes = null)
    {
        
        $key = $key ?? $this->primaryKey();
    
        $tableName = $this->tableName();
        $attributes = $attributes ??  $this->attributes();
        
        

        $params = array_map(fn($attr)=> "$attr=:$attr", $attributes);
         $params = implode(',', $params);


        $sql = "UPDATE  $tableName SET $params WHERE $key=:$key";
        
        $statement = $this->prepare($sql);
        $statement->bindValue(":$key", $id);
        foreach($attributes as $attr ){
             
            
            $statement->bindValue(":$attr", $this->{$attr});
            
        }

        $statement->execute();

       
        

        
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



    public function getAll() 
    {

        $tableName = static::tableName();

       
        $sql = "SELECT * FROM $tableName";
        $statement = self::prepare($sql);

        $statement->execute();
       
        return $statement->fetchAll();


    }

    public function fetchOne()
    {
        $tableName = static::tableName();
        $id = $this->primaryKey();

        $sql = "SELECT * FROM $tableName ORDER BY $id DESC LIMIT 1";
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




}