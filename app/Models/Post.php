<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id','title','body','created_at','updated_at'];

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
        return $this->seo()->first('image')->image;
    }
    public function slug()
    {
        return $this->seo()->first('slug')->slug;
    }
}
