<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_category extends Model
{
    protected $fillable = [
        'name',
        'event_id',
        'start_date',
        'end_date',
        'apply_before',
        'catog_event_state',
        'price',
        'km',
        'category',
        'medal_img',
        'bib_img',
        'catog_event_img',
    ]; // use HasFactory;

    public function event()
    {
        return $this->belongsTo(event::class);
    }
}
