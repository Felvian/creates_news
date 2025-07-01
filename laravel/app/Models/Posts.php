<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['post', 'date_for_posted', 'theme', 'time_for_posted', 'posted_at'];
}
