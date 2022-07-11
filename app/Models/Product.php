<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'price',
        'photosUrl',
        'stock',
        'slug',
        'category_id'
    ];

    protected $casts = [
        'photosUrl' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function manufacturers()
    {
        return $this->belongsToMany(Manufacturer::class);
    }
}
