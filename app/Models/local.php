<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class local extends Model
{
    use HasFactory;

    protected $table = 'local';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'status',
    ];


    public static function getAllLocais(){
        return self::all(); 
    }

    public function getLocalForId($id){

    } 

    public function getAtaForLocal(){

    }

}
