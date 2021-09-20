<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMedal extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'team_id',
        'event_id',
        'participants_id',
        'event_progress',
        'progress_date',
    ]; // use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function participants()
    {
        return $this->belongsTo(participants::class, 'participants_id');
    }
    public function cat_event()
    {
        return $this->belongsTo(event_category::class, 'event_id');
    }

    public function team()
    {
        return $this->belongsTo(team::class, 'team_id');
    }
}
