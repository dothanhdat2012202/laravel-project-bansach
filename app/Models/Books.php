<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medias;

class Books extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'author',
        'category_id',
        'publish_id',
        'input_price',
        'output_price',
        'quantity',
        'book_pages',
        'weight',
        'description',
        'image',
        'pages',
        'size',
        'format',
        'foreign_id',
        'setofbook_id',
        'bestseller',
        'discount'
    ];
    protected $table='books';
    // public function category()
    // {
    //     return $this->belongsTo(Category::class,'category_id');
    // }

    public function getPriceSaleAttribute() {

        $price = $this->output_price - ($this->output_price * $this->discount/100);

        return $price;

        // $product->price_sale;
    }
    public function productGaleries()
    {
        return $this->hasMany(
            \App\Models\Medias::class,
            'foreign_id'
        );
//            ->where('foreign_model', Media::MODEL_PRODUCT)
//            ->where('foreign_type', Media::GALLERIES)'
    }
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);

    }
    public function setofbooks()
    {
        return $this->belongsTo(\App\Models\SetOfBooks::class,'setofbook_id','id');
    }
}
