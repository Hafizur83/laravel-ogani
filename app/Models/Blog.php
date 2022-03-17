<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'author',
        'catagory',
        'tags',
        'image',
        'status',
        'view',
    ];
    public function catagories(){
        return $this->belongsTo(Catagory::class,'catagory');
    }

}
