<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';
    protected $fillable=[
        'id_user',
        'title',
        'sku',
        'price',
        'desc',
        'image_uri'
    ];

    public function UserModels() {
        return $this->belongsTo(User::class);
    }
}