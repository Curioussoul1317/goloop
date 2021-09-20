<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [ 
            'user_id',
            'post_id', 
            'product_id',
            'eventcat_id', 
            'comment',
]; // use HasFactory; 

public function user() {
    return $this->belongsTo(User::class, 'user_id');
}
 
public function post()
{
    return $this->belongsTo(post::class); 
}
}