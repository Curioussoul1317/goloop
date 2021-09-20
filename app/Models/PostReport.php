<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReport extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'user_id',
        'post_id',  
        'detail',
]; // use HasFactory; 

public function user() {
return $this->belongsTo(User::class, 'user_id');
}

public function post()
{
return $this->belongsTo(post::class); 
}
}
