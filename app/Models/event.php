<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'event_img',
        'start_date',
        'end_date',
        'event_state',
    ]; // use HasFactory;

    public function catevents()
    {
        return $this->hasMany(event_category::class);
    }
}
