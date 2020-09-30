<?php

namespace App\Models\Site;

use App\Models\BaseModel;
use CodeIgniter\Database\ConnectionInterface;

class PostModel extends BaseModel
{
    protected $table = 'posts';
    public function __construct(ConnectionInterFace &$db)
    {
        $this->db = &$db;
    }
    public function searchInPosts($join, $condition, $select, $where, $data, $limit = ['count' => null, 'pos' => null])
    {
        $builder = $this->db->table($this->table);
        $builder->where($where)
            ->select($select)
            ->join($join, $condition)
            ->havingLike('title', $data)
            ->orHavingLike('sub_title', $data)
            ->orHavingLike('body', $data);
        if (!empty($limit)) $builder->limit($limit['count'], $limit['pos']);
        return $builder->get()->getResult();
    }
    public function get_limited_posts($join, $condition, $select, $where, $limit = ['count' => null, 'pos' => null])
    {
        $builder = $this->db->table($this->table);
        $builder->where($where)->select($select)->join($join, $condition);
        if (!empty($limit)) $builder->limit($limit['count'], $limit['pos']);
        return $builder->get()->getResult();
    }
}
