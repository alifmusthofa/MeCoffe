<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "admin";
    protected $primaryKey = "id";
    protected $allowedFields = ["username", "password", "salt", "role"];
    protected $useTimestamps = true;
}
