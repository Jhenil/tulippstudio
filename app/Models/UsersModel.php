<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_fname', 'user_lname', 'email', 'password', 'status', 'created_at', 'last_login'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'last_login';

    public function getUsers()
    {
        return $this->findAll();
    }
}
