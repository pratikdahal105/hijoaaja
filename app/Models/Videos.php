<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Videos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'caption', 'url', 'publish_date', 'edited_by',
    ];
}
