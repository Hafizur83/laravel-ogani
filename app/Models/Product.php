<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_slug',
        'cat_id',
        'short_des',
        'long_des',
        'price',
        'product_img',
        'product_quantity',
    ];
    public function catagory(){
        return $this->belongsTo(Catagory::class,'cat_id');
    }
}

