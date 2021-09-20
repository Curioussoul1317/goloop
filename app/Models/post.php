<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'event_id',
        'products_id',
        'cat_event_id',
    ]; // use HasFactory;

    public function event()
    {
        return $this->belongsTo(event::class, 'event_id');
    }
    public function product()
    {
        return $this->belongsTo(product::class, 'products_id');
    }
    public function cat_event()
    {
        return $this->belongsTo(event_category::class, 'cat_event_id');
    }
    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
    // public function team()
    // {
    //     return $this->belongsTo(team::class, 'team_id');
    // }

    // public function comments()
    // {
    //     return $this->hasMany(comment::class);
    // }

    public function like()
    {
        return $this->hasMany(like::class);
    }
}
