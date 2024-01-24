<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitting extends Model
{
    use HasFactory;
    protected $fillable = ['key','value','created_at','updated_at'];
    public const data = ['title','description','facebook','github','instagram','linkedin','twitter','telegram'];
    protected static $selfData = [];
    public static function getSitting(string $key)
    {
        if (empty(self::$selfData)) {
            foreach (self::all() as $value)
                self::$selfData[$value->key] = $value->value;
        }
        return self::$selfData[$key];
    }
}
