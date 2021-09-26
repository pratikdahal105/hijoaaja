<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    use HasFactory;
    protected $table = 'featured';

    protected $fillable = [
        'news_id', 'till',
    ];

    public function news(){
        return $this->hasOne(News::class, 'id','news_id');
    }
}
