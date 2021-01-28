<?php
namespace main\core;
class Database
{
    public \PDO $pdo;

    public function __construct(array $configDb)
    {
        $dsn = $configDb['dsn'] ?? '';
        $pass = $configDb['pass'] ?? '';
        $user = $configDb['user'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function prepare($sql)
    {
       
        return $this->pdo->prepare($sql);
    }

    public function fetch($sql)
    {
        $stament = $this->prepare($sql);
        $stament->execute();
        return $stament->fetch();
    }

    public function fetchAll($sql)
    {
        $stament = $this->prepare($sql, $setType = null);
        $stament->execute();
        return $stament->fetchAll($setType);
    }

}