<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class participants extends Model
{
    protected $fillable = [
        'cat_event_id',
        'user_id',
        'team_id',
        'payment_id',
        'code',
        'status',
    ]; // use HasFactory;

    public function cat_event()
    {
        return $this->belongsTo(event_category::class, 'cat_event_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function team()
    {
        return $this->belongsTo(team::class, 'team_id');
    }
    public function payment()
    {
        return $this->belongsTo(payment::class, 'payment_id');
    }

    public function Progress()
    {
        return $this->hasMany(Progress::class);
    }
}
