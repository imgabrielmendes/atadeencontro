<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        // 'email',
        // 'cpf',
        // 'matricula',
    ];

    public static function getAllUsers()
    {
        return self::all();
    }
}
