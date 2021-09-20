<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_notifications extends Model
{
    protected $fillable = [
        'participation_id',
        'team_id',
        'cart_id',
        'notification',
        'status',
        'by_user_id',
    ]; // use HasFactory;
    public function users()
    {
        return $this->belongsTo(User::class, 'by_user_id');
    }
    public function team()
    {
        return $this->belongsTo(team::class, 'team_id');
    }
}
