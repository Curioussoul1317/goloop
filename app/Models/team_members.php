<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team_members extends Model
{
    protected $fillable = [
        'team_id',
        'member_id',
        'participant_id',
        'status',
    ]; // use HasFactory;

    public function team()
    {
        return $this->belongsTo(team::class, 'team_id');
    }
    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
    public function participant()
    {
        return $this->belongsTo(participants::class, 'participant_id');
    }
}
