<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $table = 'seo';
    public $timestamps = false;
    protected $fillable = ['slug','post_id','description','image'];
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
