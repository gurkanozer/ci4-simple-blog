<?php namespace App\Models\Admin;

use App\Models\BaseModel;
use CodeIgniter\Database\ConnectionInterface;

class CategoryModel extends BaseModel{

    protected $table = 'categories';
    public function __construct(ConnectionInterFace &$db){
        $this->db =& $db;
        
    }
}