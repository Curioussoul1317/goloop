<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = [
        'user_id',
        'products_id',
        'payment_id',
        'gender',
        'size',
        'delivered',
        'qty',
        'total',
    ]; // use HasFactory;
    public function productsize()
    {
        return $this->belongsTo(productsize::class, 'products_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function slip()
    {
        return $this->belongsTo(payment::class, 'payment_id');
    }
}
