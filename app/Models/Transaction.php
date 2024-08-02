<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'transaction';

    protected $fillable = [
        'product_id',
        'reference',
        'customer',
        'quantity',
        'total',
        'status'
    ];

    public static $rules = [
        'product_id' => 'required',
        'customer' => 'required|string|max:255',
        'quantity' => 'required|integer',
        'total' => 'required'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
