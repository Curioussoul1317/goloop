<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name',
        'img',
        'description',
        'delivered',
    ]; // use HasFactory;

    public function infos()
    {
        return $this->hasMany(productsize::class);
    }
}
