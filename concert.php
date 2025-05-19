<?php
require_once 'database.php';

class Concert
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllConcerts()
    {
        return $this->db->select('concerts');
    }

    public function getConcertById($id)
    {
        return $this->db->select('concerts', ['id' => $id]);
    }

    public function addConcert($data)
    {
        return $this->db->insert('concerts', $data);
    }

    public function deleteConcert($id)
    {
        return $this->db->delete('concerts', ['id' => $id]);
    }

    public function updateConcert($data, $where)
    {
        return $this->db->update('concerts', $data, $where);
    }
}
