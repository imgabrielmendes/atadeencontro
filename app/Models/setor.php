<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setor extends Model
{
    use HasFactory;

    protected $table = 'setor';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'status',
    ];


    public static function getAllSetores(){
        return self::all(); 
    }
}
