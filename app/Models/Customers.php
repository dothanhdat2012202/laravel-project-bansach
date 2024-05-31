<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Customers as Authenticatable;

class Customers extends Authenticatable

{
    use HasFactory;
    protected $table='customers';
}
