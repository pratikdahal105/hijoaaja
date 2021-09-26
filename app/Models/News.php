<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'slug', 'author', 'title', 'thumbnail', 'summary', 'short_description', 'body', 'publish_date', 'category_id', 'status', 'edited_by',
    ];

    public function category(){
        return $this->hasOne(Category::class ,'id', 'category_id');
    }

    public function feature(){
        return $this->hasOne(Featured::class, 'news_id','id');
    }

    public function sluggable(){
        return [
          'slug' => [
              'source' => 'title'
          ]
        ];
    }
}
