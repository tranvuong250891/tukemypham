<?php
namespace main\core;
class Database
{
    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $pass = $config['pass'] ?? '';
        $user = $config['user'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    }
}