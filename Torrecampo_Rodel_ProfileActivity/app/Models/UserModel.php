<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    // Updated this array to include your new database columns
    protected $allowedFields = [
        'fullname', 'username', 'email', 'password', 
        'student_id', 'course', 'year_level', 
        'section', 'phone', 'address', 'profile_image'
    ];

    protected $useTimestamps = true;

    // Added this method to handle the profile update specifically
    public function updateProfile($id, $data)
    {
        return $this->update($id, $data);
    }
}
