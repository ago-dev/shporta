<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps = false;

    use HasFactory;

    public function user() {
        return $this->hasMany(User::class);
    }

    public static function getRoleByName($role): Role {
        return Role::where('name', $role)->first();
    }
}
