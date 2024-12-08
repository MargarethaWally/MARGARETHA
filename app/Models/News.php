<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = ['title', 'content', 'thumbnail', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'news_id');
    }
}