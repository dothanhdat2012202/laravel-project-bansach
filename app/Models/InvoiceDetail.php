<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $table='invoices_detail';
    
    protected $guarded = [];
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function book()
    {
        return $this->belongsTo(Books::class,'book_id');
    }
}
