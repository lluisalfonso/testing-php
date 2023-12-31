<?php

namespace App;

class ProductRepository
{
    protected $pdo;

    protected function getPdo(): \PDO
    {
        if ($this->pdo === null) {

            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ];

            try {
                $this->pdo = new \PDO("mysql:host=127.0.0.1;dbname=testing-php;charset=utf8mb4", 'root', '', $options);

            } catch (\PDOException $PDOException) {

                throw new \PDOException($PDOException->getMessage(), (int) $PDOException->getCode());
            }
        }

        return $this->pdo;
    }


    /**
     * Fetch an array of products from the database
     *
     * @return array
     */
    public function fetchProducts(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM products')->fetchAll(\PDO::FETCH_ASSOC);
    }
}