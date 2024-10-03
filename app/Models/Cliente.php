<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class Cliente extends Model
{

    use HasFactory;
    protected $table='clientes';
    protected $primaryKey = 'id';
    protected $fillable=['nombre','apellido','telefono','direccion','ciudad',];
    protected $guarded=[];
    public $timestamp =false;
}
