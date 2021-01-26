<?php
namespace main\core\database;

use main\core\Main;
use main\core\model\Model;

abstract class DbModel extends Model
{
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

        $statement->execute();
        return true;
        
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

    public function prepare($sql)
    {
        return Main::$main->db->pdo->prepare($sql);
    }

    public function getAll() 
    {

        $tableName = static::tableName();

       
        $sql = "SELECT * FROM $tableName";
        $statement = self::prepare($sql);

        $statement->execute();
       
        return $statement->fetchAll();


    }




}