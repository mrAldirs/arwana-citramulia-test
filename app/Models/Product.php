<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'type',
        'description',
        'price',
        'stock',
        'image',
    ];
    
    public static $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'description' => 'required',
        'price' => 'required|integer',
        'stock' => 'required|integer',
        'image' => 'image|mimes:jpg,png,jpeg,webp',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
