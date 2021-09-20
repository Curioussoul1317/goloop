<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_notifications extends Model
{
    protected $fillable = [
        'posts_id',
        'participation_id',
        'follow_id',
        'team_id',
        'notification',
        'status',
        'by_user_id',
        'to_user_id',
    ];
    // use HasFactory;
    public function event()
    {
        return $this->belongsTo(participants::class, 'participation_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'by_user_id');
    }
}
