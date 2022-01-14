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

    public function create()
    {
        // Create user
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
}