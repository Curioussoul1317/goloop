<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    protected $fillable = [
        'name',
        'users_id', 
        'img',
        'status',
    ]; // use HasFactory;

    public function members()
    {
        return $this->hasMany(team_members::class);
    }
    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }
     
}
