<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    use HasFactory;

    public function getRoleByName($role): Role {
        return $this::where('name', $role)->first();
    }
}