<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id','title','body','created_at','updated_at'];
    protected static array $posts = [];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function seo()
    {
        return $this->hasOne(Seo::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function photo()
    {
        if (!isset(self::$posts[$this->id])) {
            self::$posts[$this->id] =$this->seo()->first();
        }
        return self::$posts[$this->id]->image;
    }
    public function slug()
    {
        if (!isset(self::$posts[$this->id])) {
            self::$posts[$this->id] =$this->seo()->first();
        }
        return self::$posts[$this->id]->slug;
    }
}
