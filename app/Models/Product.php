<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * table
     */
    protected $table = 'products';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'category',
        'price',
        'image',
    ];
}
