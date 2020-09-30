<?php

namespace App\Models\Site;

use App\Models\BaseModel;
use CodeIgniter\Database\ConnectionInterface;

class EmailSettingsModel extends BaseModel
{
    protected $table = 'email_settings';
    public function __construct(ConnectionInterFace &$db)
    {
        $this->db = &$db;
    }
}
