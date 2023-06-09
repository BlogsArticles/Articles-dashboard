<?php

namespace Core;

use PDO;
use Core\Logger;

class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        try{

            $this->connection = new PDO($dsn, $username, $password, [
               PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }catch(\PDOException $e){
            Logger::error($e);
            abort(Response::INTERNAL_ERROR);
        }
        
    }

    public function query($query, $params = []) // return this to use the method chaining method
    {
        // Prepared statement to prevent the sql injection
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }
}
