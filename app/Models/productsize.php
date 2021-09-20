<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productsize extends Model
{
    protected $fillable = [
        'product_id',
        'gender',
        'size',
        'qty',
        'price',
    ]; // use HasFactory;

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}
