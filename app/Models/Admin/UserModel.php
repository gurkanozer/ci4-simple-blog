<?php namespace App\Models\Admin;

use App\Models\BaseModel;
use CodeIgniter\Database\ConnectionInterface;

class UserModel extends BaseModel
{
    protected $table = 'users';
    public function __construct(ConnectionInterFace &$db){
        $this->db =& $db;
    }
    public function update_user($user,$data){

        if($data['is_password_change']=='on'){
            $user->password = encrypt_password($data['password']);
        }
        $user->fullname = $data['fullname'];
        $user->email = $data['email'];
        return $this->update(['id'=>$user->id],$user);
    }
}