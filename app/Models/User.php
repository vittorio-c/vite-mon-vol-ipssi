<?php

namespace App\Models;

use App\Services\DB;
use stdClass;

class User
{
    protected DB $db;

    protected stdClass|array $data;

    public function __construct()
    {
        $this->db = DB::instance();
    }

    public function find($id)
    {
        $results = $this->db->run('SELECT * FROM users WHERE id = ?', [$id])->fetch();

        return $this->setData($results);
    }

    public function findAll()
    {
        $results = $this->db->run('SELECT * FROM users')->fetchAll();

        return $this->setData($results);
    }

    public function create(array $payload)
    {
        return $this->db->run('
            INSERT INTO users(username, email, password) 
            VALUES (?, ?, ?)', [$payload['username'], $payload['email'], $payload['password']]
        );
    }

    public function update(array $data)
    {
        // Update
    }

    public function setData(stdClass|array $data): User
    {
        $this->data = $data;
        return $this;
    }

    public function getData(): stdClass|array
    {
        return $this->data;
    }

    public function login($email, $password)
    {
        $results = $this->db->run('SELECT * FROM users WHERE email = ? AND password = ?', [$email, $password])
            ->fetch();

        return $this->setData($results);
    }

    public function isLoggedIn()
    {
        // optionnel : get la variable de session
    }

    public function isAdmin()
    {

    }

    public function getCircuits($userId)
    {

    }
}
