<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medias extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_name',
        'foreign_id',
        'file_size',
        'file_type'
    ];
    protected $table='medias';
}
