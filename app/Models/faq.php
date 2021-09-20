<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faq extends Model
{
    protected $fillable = [ 
       'questions',
       'answers',
       'status',
  ]; // use HasFactory; 
}
