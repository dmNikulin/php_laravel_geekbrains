<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\NewsHidden;

class News extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];
}
