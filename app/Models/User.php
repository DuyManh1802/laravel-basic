<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function allUser()
    {
        $users = DB::select('SELECT * fROM ' . $this->table . ' ORDER BY created_at DESC');

        return $users;
    }

    public function addUser($data)
    {
        DB::insert('INSERT INTO ' . $this->table . ' (name, email, password, created_at) values (?, ?, ?, ?)', $data);
    }

    public function findId($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id)
    {
        $data[] = $id;

        return DB::update('UPDATE ' . $this->table . ' SET name = ?, email = ?, updated_at = ? WHERE id = ?', $data);
    }

    public function deleteUser($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }
}