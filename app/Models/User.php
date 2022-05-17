<?php

namespace App\Models;

use App\Http\Requests\UserStoreRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable /* implements MustVerifyEmail */
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'role_id',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public static function store(UserStoreRequest $request, $role): User {
        $userData = [
            'first_name' => $request['firstName'],
            'last_name' => $request['lastName'],
            'email' => $request['email'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role_id' => Role::getRoleByName($role)->id
        ];

        return User::create($userData);
    }

    public static function edit(Request $data, $userId) {
        $user = User::find($userId);
        if ($user) {
            $user->first_name = $data['firstNameUpdate'];
            $user->last_name  = $data['lastNameUpdate'];
            $user->username  = $data['usernameUpdate'];
            $user->email     = $data['emailUpdate'];
            $user->save();
        }
    }
}
