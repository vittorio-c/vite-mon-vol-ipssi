<?php

namespace App\Models;

use App\Services\DB;
use stdClass;

class Tour
{
    protected DB $db;

    protected stdClass|array $data;

    public function __construct()
    {
        $this->db = DB::instance();
    }

    public function find($id)
    {
        $results = $this->db->run('SELECT * FROM tours WHERE id = ?', [$id])->fetch();

        return $this->setData($results);
    }

    public function findAll()
    {
        $results = $this->db->run('SELECT * FROM tours')->fetchAll();

        return $this->setData($results);
    }

    public function setData(stdClass|array $data): Tour
    {
        $this->data = $data;
        return $this;
    }

    public function getData(): stdClass|array
    {
        return $this->data;
    }
}
