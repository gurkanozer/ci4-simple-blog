<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class BaseModel
{
    protected $db;
    public function __construct(ConnectionInterFace &$db)
    {
        $this->db = &$db;
    }
    public function get($data)
    {
        return $this->db->table($this->table)->where($data)->get()->getRow();
    }
    public function get_all($where = [])
    {
        return $this->db->table($this->table)->where($where)->get()->getResult();
    }
    public function add($data = [])
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function update($where = [], $data = [])
    {
        return $this->db->table($this->table)->set($data)->where($where)->update();
    }
    public function delete($where = [])
    {
        return $this->db->table($this->table)->where($where)->delete();
    }
    public function join($join, $condition, $select, $where)
    {
        return $this->db->table($this->table)->where($where)->select($select)->join($join, $condition)->get()->getResult();
    }
    public function like($whereIn, $data)
    {
        return $this->db->table($this->table)->havingLike($whereIn, $data)->get()->getResult();
    }
}
