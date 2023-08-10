<?php

namespace App\Models;

use App\Observers\StoreObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::observe(StoreObserver::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categories(){
        return $this->hasMany(Category::class)->latest();
    }
}
