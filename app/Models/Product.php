<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function booted(){
        static::observe(ProductObserver::class);

    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function avgRating() :int{
        return (int) $this->ratings()->selectRaw("avg(rating_value) as rating")->first()["rating"];
    }

    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }
}
